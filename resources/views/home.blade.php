
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 
@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header' , ['name' => 'Home' , 'key' => 'Home'])
    <!-- /.content-header -->
     <div class="col-md-12 clearfix">
     
     <a href="{{ route('categories.create') }}" class="m-2 ml-auto btn btn-success float-right">Thêm</a>
     </div>
<div class="col-md-12">
Trang Chu
</div>

   
    

 
    <!-- /.content -->
  </div>
@stop






