
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 
@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header',['name' => 'Category' , 'key' => 'List'])
    <!-- /.content-header -->
     <div class="col-md-12 clearfix">
     
     <a href="{{ route('categories.create') }}" class="m-2 ml-auto btn btn-success float-right">Thêm</a>
     </div>
     <!-- Thêm thông báo thành công -->
     @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<div class="col-md-12">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category -> id}}</th>
      <td>{{$category -> name}}</td>
      <td>
        <a href="{{route('categories.edit' , ['id' => $category -> id])}}" class="btn btn-default">Sửa</a>
        <a href="{{route('categories.delete' , ['id' => $category -> id])}}" class="btn btn-danger">Xóa</a>
      </td>
   
    </tr>
  
    @endforeach
  </tbody>
</table>
<div class="col-md-12">
{{ $categories->links('pagination::bootstrap-4') }}
</div>
</div>

   
    

 
    <!-- /.content -->
  </div>
@stop






