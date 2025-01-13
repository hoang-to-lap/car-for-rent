
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 
@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header' , ['name' => 'Setting' , 'key' => 'EDIT'])
    <!-- /.content-header -->
  
  <div class="col-md-12">
  <h3>Chỉnh sửa Setting</h3>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('settings.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="site_name">Tên trang web</label>
                <input type="text" name="site_name" id="site_name" class="form-control" value="{{ $setting->site_name }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="address">Địa chỉ</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $setting->address }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="phone">Số điện thoại</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $setting->phone }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $setting->email }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Cập nhật</button>
        </form>
  </div>
   
    

 
    <!-- /.content -->
  </div>
@stop






