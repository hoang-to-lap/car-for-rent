<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; 

class CategoryController extends Controller
{

    private $category;

public function __construct(Category $category)
{

    $this->category = $category;
    $this->middleware('auth');
}

    public function create(){
        $htmlOption = $this->getCategory($parentId = '');


    return view('category.add', compact('htmlOption'));
    }


   
    public function index(){
     
        $categories = Category::latest()->paginate(5);
    return view('category.index', compact('categories'));
    }
    public function store(Request $request){
        $this->category->create([
            'name'=> $request -> name ,
            'parent_id' => $request -> parent_id ,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route(route:'categories.index');
    }
public function getCategory($parentId){
    $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption =  $recusive-> categoryRecusive($parentId);
        return $htmlOption;
}

    public function edit($id){

    $category = $this->category->find($id);
    $htmlOption = $this->getCategory($category -> parent_id);

        return view('category.edit' , compact('category' , 'htmlOption'));
    }
    public function update($id , Request $request){
$this -> category -> find($id) -> update([
    'name'=> $request -> name ,
    'parent_id' => $request -> parent_id ,
    'slug' => Str::slug($request->name),
]);
Session::flash('success', 'Cập nhật danh mục thành công!');
    
return redirect()->route('categories.index');
    }
    // public function delete($id){
    //     $this->category->find($id)->delete();
    //     return redirect()->route('categories.index');
    // }
    public function delete($id)
{
    
    $category = $this->category->findOrFail($id);

    // Xóa danh mục
    $category->delete();

    return redirect()->route('categories.index')->with('success', 'Danh mục đã được xóa.');
}
}
