
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 
@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header' , ['name' => 'Slider' , 'key' => 'ADD'])
    <!-- /.content-header -->
    <div class="col-md-6">
      
    <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
      @csrf
  <div class="form-group">
    <label >Tên slider</label>
    <input type="input" class="form-control @error('name') is-invalid @enderror" 
    name="name"
    placeholder="Nhập tên Slide" value="{{old('name')}}">
    
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label >Mô tả</label>
    <textarea name="description" id="" rows="5" class="col-md-12 @error('description') is-invalid @enderror">{{old('description')}}</textarea>
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label >Hình ảnh</label>
    <input type="file" class="form-control-file @error('image_path') is-invalid @enderror" 
    name="image_path" value="{{old('image_path')}}"
    >
    @error('image_path')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form></div>
  
   
    

 
    <!-- /.content -->
  </div>
@stop






