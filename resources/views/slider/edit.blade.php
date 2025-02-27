
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 
@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header' , ['name' => 'Slider' , 'key' => 'Edit'])
    <!-- /.content-header -->
    <div class="col-md-6">
      
    <form action="{{route('slider.update' , ['id' => $slider->id])}}" method="post" enctype="multipart/form-data">
      @csrf
  <div class="form-group">
    <label >Tên slider</label>
    <input type="input" class="form-control " 
    name="name"
    placeholder="Nhập tên Slide" value="{{$slider->name}}">
    
   
  </div>
  <div class="form-group">
    <label >Mô tả</label>
    <textarea name="description" id="" rows="5" class="col-md-12 ">{{$slider->description}}</textarea>
    
  </div>
  <div class="form-group">
    <label >Hình ảnh</label>
    <input type="file" class="form-control-file " 
    name="image_path" 
    >
    <div class="col-md-12">
    <div class="row">
        <img src="{{$slider->image_path}}" alt="" style="width: 300px; height: 250px; object-fit: cover; border-radius: 8px;">
    </div>
  </div>
  </div>
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form></div>
  
   
    

 
    <!-- /.content -->
  </div>
@stop






