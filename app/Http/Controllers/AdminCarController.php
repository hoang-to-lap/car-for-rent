<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Car;
use App\Models\CarImage;
use Exception;
use Illuminate\Support\Facades\Log;
 use Illuminate\Support\Facades\DB;

class AdminCarController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $car;
    private $carImage;

      public function __construct(Category $category , Car $car , CarImage $carImage)
    {
        $this->middleware('auth');
        $this->category = $category;
        $this->car = $car;
        $this->carImage = $carImage;
    }
    public function index(){
        $cars = $this ->car ->paginate(5);
        return view('car.index', compact('cars'));
    }
    public function create() {
        $htmlOption = $this->getCategory($parentId = '');
        return view('car.add', compact('htmlOption'));
    }
    public function getCategory($parentId){
        $data = $this->category->all();
            $recusive = new Recusive($data);
            $htmlOption =  $recusive-> categoryRecusive($parentId);
            return $htmlOption;
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'status' => 'required',
        'price_ngay' => 'required',
        'year' => 'required',
        'seat' => 'required',
        'content' => 'required',
        'category_id' => 'required',
    ]);

    try {
        DB::beginTransaction();

        $dataCarCreate = [
            'name' => $request->name,
            'status' => $request->status,
            'price_ngay' => $request->price_ngay,
            'price_thang' => $request->price_thang,
            'price_nam' => $request->price_nam,
            'year' => $request->year,
            'seat' => $request->seat,
            'odo' => $request->odo,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id
        ];

        // Upload ảnh chính
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'car');
        if (!empty($dataUploadFeatureImage)) {
            $dataCarCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataCarCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }

        // Tạo mới car
        $car = $this->car->create($dataCarCreate);

        // Upload ảnh chi tiết
        if ($request->hasFile('image_path')) {
            foreach ($request->file('image_path') as $fileItem) {
                $dataCarImageDetail = $this->storageTraitUploadMutiple($fileItem, 'car');
                $car->images()->create([
                    'image_path' => $dataCarImageDetail['file_path'],
                    'image_name' => $dataCarImageDetail['file_name'],
                ]);
            }
        }

        DB::commit();
        session()->flash('success', 'Thêm thành công');
        return redirect()->route('car.index');
    } catch (Exception $exception) {
        DB::rollBack();
        Log::error("Error: " . $exception->getMessage() . ' Line: ' . $exception->getLine());
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
}
public function delete($id)
{
    try {
        $car = $this->car->findOrFail($id);
        $car->delete();

        return redirect()->route('car.index')->with('success', 'Xóa thành công!');
    } catch (\Exception $exception) {
        return redirect()->route('car.index')->with('error', 'Xóa không thành công!');
    }
}
public function edit($id){
    $car = $this->car->find($id);
    $htmlOption = $this->getCategory($car->category_id);
    return view('car.edit', compact('htmlOption' , 'car'));
}
public function update(Request $request , $id){
    try {
        DB::beginTransaction();

        $dataCarUpdate = [
            'name' => $request->name,
            'status' => $request->status,
            'price_ngay' => $request->price_ngay,
            'price_thang' => $request->price_thang,
            'price_nam' => $request->price_nam,
            'year' => $request->year,
            'seat' => $request->seat,
            'odo' => $request->odo,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id
        ];

        // Upload ảnh chính
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'car');
        if (!empty($dataUploadFeatureImage)) {
           $dataCarUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataCarUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }

        // Tạo mới car
        $this->car->find($id)->update($dataCarUpdate);
        $car = $this -> car -> find($id);

        // Upload ảnh chi tiết
        if ($request->hasFile('image_path')) {
            $this -> carImage ->where('car_id' , $id)->delete();
            foreach ($request->file('image_path') as $fileItem) {

                $dataCarImageDetail = $this->storageTraitUploadMutiple($fileItem, 'car');
                $car->images()->create([
                    'image_path' => $dataCarImageDetail['file_path'],
                    'image_name' => $dataCarImageDetail['file_name'],
                ]);
            }
        }

        DB::commit();
        session()->flash('success', 'Sửa thành công');
        return redirect()->route('car.index');
    }catch (Exception $exception) {
        DB::rollBack();
        Log::error("Error: " . $exception->getMessage() . ' Line: ' . $exception->getLine());
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
}

}
