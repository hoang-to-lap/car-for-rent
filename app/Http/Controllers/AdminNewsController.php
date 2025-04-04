<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\DB;
class AdminNewsController extends Controller
{
    //
    use StorageImageTrait;
    private $news;
    public function __construct( News $news)
{
    $this->news = $news;
   
    $this->middleware('auth');
}
public function index()
{
    $news = News::latest()->paginate(5);
    return view('news.index', compact('news'));
}
public function create()
{

    $newscategories = NewsCategory::all(); // Lấy toàn bộ danh mục

    return view('news.add', compact('newscategories'));
}
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'content' => 'required',
        'id_categorynews' => 'required',
    ]);

    try {
        DB::beginTransaction();

        // Chuẩn bị dữ liệu
        $dataCarCreate = [
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'id_categorynews' => $request->id_categorynews
        ];

        // Xử lý upload ảnh (nếu có)
        $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'news');
        if (!empty($dataUploadImage)) {
            $dataCarCreate['image_name'] = $dataUploadImage['file_name'];
            $dataCarCreate['image_path'] = $dataUploadImage['file_path'];
        }

        // Thực hiện tạo mới
        $news = $this->news->create($dataCarCreate);

        DB::commit();
        session()->flash('success', 'Thêm thành công');
        return redirect()->route('news.index');
    } catch (Exception $exception) {
        DB::rollBack();
        Log::error("Error: " . $exception->getMessage() . ' Line: ' . $exception->getLine());
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
}
public function delete($id)
{
    try {
        $news = $this->news->findOrFail($id);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'Xóa thành công!');
    } catch (\Exception $exception) {
        return redirect()->route('news.index')->with('error', 'Xóa không thành công!');
    }            

}
public function edit($id){
    $news = $this->news->find($id);
    $newscategories = NewsCategory::all(); // 
    return view('news.edit', compact('newscategories' , 'news'));
}
public function update(Request $request, $id)
{
  
    try {
        DB::beginTransaction();

        // Lấy bản ghi cần update
        $news = $this->news->find($id);

        if (!$news) {
            return redirect()->back()->with('error', 'Không tìm thấy tin tức.');
        }

        $dataUpdate = [
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'id_categorynews' => $request->id_categorynews,
        ];

   
        if ($request->hasFile('image_path')) {
            $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'news');
            if (!empty($dataUploadImage)) {
                $dataUpdate['image_name'] = $dataUploadImage['file_name'];
                $dataUpdate['image_path'] = $dataUploadImage['file_path'];
            }
        }

        // Cập nhật dữ liệu
        $news->update($dataUpdate);

        DB::commit();

        session()->flash('success', 'Cập nhật tin tức thành công');
        return redirect()->route('news.index');
    } catch (\Exception $exception) {
        DB::rollBack();
        Log::error("Error: " . $exception->getMessage() . ' Line: ' . $exception->getLine());
        return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
    }
}
}
