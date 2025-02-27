
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 
@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header' , ['name' => 'News Category' , 'key' => 'ADD'])
    <!-- /.content-header -->
    <div class="col-md-6">
      
    <form action="{{route('newscategory.store')}}" method="post">
      @csrf
  <div class="form-group">
    <label >Tên danh tin tức</label>
    <input type="input" class="form-control" 
    name="name"
    placeholder="Nhập tên danh mục">
    
  </div>
 

  <button type="submit" class="btn btn-primary">Submit</button>
</form></div>
  
   
    

 
    <!-- /.content -->
  </div>
@stop






