<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;


class AdminSliderController extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function __construct( Slider $slider)
{
    $this->slider = $slider;
   
    $this->middleware('auth');
}

    public function index(){
        $sliders = $this ->slider ->paginate(5);
        return view('slider.index' , compact('sliders'));
    }
    public function create(){
        return view('slider.add');
    }
    
    public function store(SliderAddRequest $request)
{
    try {
        $dataInsert = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // Xử lý upload ảnh
        $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
        if (isset($dataImageSlider['file_name']) && isset($dataImageSlider['file_path'])) {
            $dataInsert['image_name'] = $dataImageSlider['file_name'];
            $dataInsert['image_path'] = $dataImageSlider['file_path'];
        }

        // Lưu vào database
        $this->slider->create($dataInsert);

        // Thêm thông báo thành công
        return redirect()->route('slider.index')->with('success', 'Thêm slider thành công!');
    } catch (\Exception $exception) {
        Log::error("Error: " . $exception->getMessage() . ' Line: ' . $exception->getLine());

        // Trả về trang trước với thông báo lỗi
        return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
    }
}
public function delete($id)
{
    try {
        $slider = $this->slider->findOrFail($id);
        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'Xóa thành công!');
    } catch (\Exception $exception) {
        return redirect()->route('slider.index')->with('error', 'Xóa không thành công!');
    }


}
public function edit($id){
    $slider = $this->slider->find($id);
    
    return view('slider.edit', compact('slider'));
}
public function update(Request $request, $id)
{
    try {
        $dataUpdate = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // Xử lý upload ảnh
        $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
        if (isset($dataImageSlider['file_name']) && isset($dataImageSlider['file_path'])) {
            $dataUpdate['image_name'] = $dataImageSlider['file_name'];
            $dataUpdate['image_path'] = $dataImageSlider['file_path'];
        }
       
        // Lưu vào database
        $this->slider->find($id)->update($dataUpdate);

        // Thêm thông báo thành công
        return redirect()->route('slider.index')->with('success', 'Update slider thành công!');
    } catch (\Exception $exception) {
        Log::error("Error: " . $exception->getMessage() . ' Line: ' . $exception->getLine());

        // Trả về trang trước với thông báo lỗi
        return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
    }
}

}