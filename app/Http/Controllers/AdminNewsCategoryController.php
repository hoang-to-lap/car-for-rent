<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; 

class AdminNewsCategoryController extends Controller
{
    //private $slider;
    private $newsCategory;
    public function __construct( NewsCategory $newsCategory)
    {
        $this->newsCategory = $newsCategory;
       
        $this->middleware('auth');
    }
    public function index(){
        $newsCategories = NewsCategory::latest()->paginate(5);
        return view('newscategory.index', compact('newsCategories'));
    }
    public function create(){
       

    return view('newscategory.add');
    }
    public function store(Request $request){
        $this->newsCategory->create([
            'name'=> $request -> name ,
          
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route(route:'newscategory.index');
    }
    public function edit($id){

        $newsCategory = $this->newsCategory->find($id);
       
    
            return view('newscategory.edit' , compact('newsCategory'));
        }
        public function update($id , Request $request){
            $this -> newsCategory -> find($id) -> update([
                'name'=> $request -> name ,
                
                'slug' => Str::slug($request->name),
            ]);
            Session::flash('success', 'Cập nhật danh mục thành công!');
                
            return redirect()->route('newscategory.index');
                }
                public function delete($id)
                {
                    try {
                        $newsCategory = $this->newsCategory->findOrFail($id);
                        $newsCategory->delete();
                
                        return redirect()->route('newscategory.index')->with('success', 'Xóa thành công!');
                    } catch (\Exception $exception) {
                        return redirect()->route('newscategory.index')->with('error', 'Xóa không thành công!');
                    }            

}
}