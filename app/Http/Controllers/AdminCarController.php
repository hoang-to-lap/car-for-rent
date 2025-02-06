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
        return view(view:'car.index');
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
    public function store(Request $request){

        $dataCarCreate = [
            'name' => $request->name,
            'status' =>$request->status,
            'price_ngay'=>$request->price_ngay,
            'price_thang'=>$request->price_thang,
            'price_nam'=>$request->price_nam,
            'year' => $request->year,
            'seat' =>$request->seat,
            'odo' =>$request->odo,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request , fieldName:'feature_image_path' , foderName:'car');
        if(!empty($dataUploadFeatureImage)){
            $dataCarCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataCarCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
     $car =    $this->car->create($dataCarCreate);
    
    
     //insert data to car_image
     if($request->hasFile(key:'image_path')){
        foreach($request->image_path as $fileItem){
            $dataCarImageDetail = $this->storageTraitUploadMutiple($fileItem , foderName:'car');
          $car->images()->create([
            
            'image_path' => $dataCarImageDetail['file_path'],
            'image_name' => $dataCarImageDetail['file_name'],
        ]);
         
            // $this->carImage->create([
            //     'car_id' => $car->id,
            //     'image_path' => $dataCarImageDetail['file_path'],
            //     'image_name' => $dataCarImageDetail['file_name'],
            // ]);
        }
     }
       
    }
}
