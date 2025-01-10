
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 
@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header' , ['name' => 'Category' , 'key' => 'EDIT'])
    <!-- /.content-header -->
    <div class="col-md-6">
      
    <form action="{{route('categories.update' , ['id' => $category -> id])}}" method="post">
      @csrf
  <div class="form-group">
    <label >Tên danh mục xe</label>
    <input type="input" class="form-control" 
    name="name"
    value="{{$category->name}}"
    placeholder="Nhập tên danh mục">
    
  </div>
  <div class="form-group">
    <label >Chọn danh mục cha</label>
    <select class="form-control" name ="parent_id">
      <option value="0">Chọn danh mục cha</option>
     {!!$htmlOption!!}
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form></div>
  
   
    

 
    <!-- /.content -->
  </div>
@stop






