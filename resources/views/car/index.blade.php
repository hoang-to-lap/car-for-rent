
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 
@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header',['name' => 'Car' , 'key' => 'List'])
    <!-- /.content-header -->
     <div class="col-md-12 clearfix">
     
     <a href="{{route('car.create')}}" class="m-2 ml-auto btn btn-success float-right">Thêm</a>
     </div>
     <!-- Thêm thông báo thành công -->
     <!-- @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif -->
<div class="col-md-12">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên Xe</th>
      <th scope="col">Gia thuê theo ngày</th>
     
      <th scope="col">Hình ảnh</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Năm sản xuất</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row">1</th>
      <td> O to con</td>
      <td> 5</td>
      <td> <img src="" alt="" srcset=""></td>
      <td> hien thi</td>
      <td>  2000</td>
      <td>  o to </td>
      <td>
        <a href="" class="btn btn-default">Sửa</a>
        <a href="" class="btn btn-danger">Xóa</a>
      </td>
   
    </tr>

  </tbody>
</table>
<div class="col-md-12">

</div>
</div>

   
    

 
    <!-- /.content -->
  </div>
@stop






