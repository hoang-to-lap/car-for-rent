
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 


@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header' , ['name' => 'Car' , 'key' => 'Edit'])
    <!-- /.content-header -->
    <div class="col-md-12">
      
    <form action="{{route('car.update' , ['id' => $car->id])}}" method="post" enctype="multipart/form-data">
      @csrf

   
  <div class="form-group">
    <label >Tên  xe</label>
    <input type="input" class="form-control" 
    name="name"
    placeholder="Nhập tên xe"  value="{{$car->name}}">
     @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label >Trạng Thái</label>
    <label>
  <input type="radio" name="status" value="visible" checked> Hiển thị
</label>
<label>
  <input type="radio" name="status" value="hidden"> Ẩn
</label>
    
  </div>
  <div class="form-group">
    <label >Giá thuê xe theo ngày</label>
    <input type="input" class="form-control" 
    name="price_ngay"
    placeholder="Nhập giá" value="{{$car->price_ngay}} ">
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label >Giá thuê xe theo tháng</label>
    <input type="input" class="form-control" 
    name="price_thang"
    placeholder="Nhập giá" value="{{$car->price_thang}}">
  
  </div>
  <div class="form-group">
    <label >Giá thuê xe theo năm</label>
    <input type="input" class="form-control" 
    name="price_nam"
    placeholder="Nhập giá" value="{{$car->price_nam}}">
   
  </div>
  <div class="form-group">
    <label >Ảnh đại diện</label>
    <input type="file" class="form-control-file" 
    name="feature_image_path"
    >
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-md-12">
    <div class="row">
        <img src="{{$car->feature_image_path}}" alt="" style="width: 300px; height: 250px; object-fit: cover; border-radius: 8px;">
    </div>
  </div>
  <div class="form-group">
    <label >Ảnh chi tiết</label>
    <input type="file"
    multiple
    class="form-control-file" 
    name="image_path[]"
    >
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="clo-md-12">
    <div class="row">
        @foreach($car -> carImages  as $carIamgeItem)
        <div class="col-md-3">
            <img src="{{$carIamgeItem -> image_path}}" alt="" srcset="" style="width: 200px; height: 200px; object-fit: cover; border-radius: 8px;">
        </div>
        @endforeach
    </div>
  </div>
  <div class="form-group">
    <label >Năm sản xuất</label>
    <input type="input" class="form-control" 
    name="year"
    placeholder="Năm sản xuất" value="{{$car->year}}">
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label >Chỗ ngồi</label>
    <input type="input" class="form-control" 
    name="seat"
    placeholder="Nhập số ghê ngồi" value="{{$car->seat}}">
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label >Số Km xe đã chạy</label>
    <input type="input" class="form-control" 
    name="odo"
    placeholder="Nhập số km" value="{{$car->odo}}">
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="my-editor" id="my-editor" name="content" rows="5"> {{$car->content}}</textarea>
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  
  <div class="form-group">
    <label >Chọn danh mục </label>
    <select class="form-control" name ="category_id">
      <option value="0">Chọn danh mục </option>
     {!!$htmlOption!!}
    </select>
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form></div>
  
   
    

 
    <!-- /.content -->
   
  </div>
@stop

@section('js')








<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<script>
  var options = {
    filebrowserImageBrowseUrl: '/filemanager?type=Images',
    filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token={{ csrf_token() }}',
    filebrowserBrowseUrl: '/filemanager?type=Files',
    filebrowserUploadUrl: '/filemanager/upload?type=Files&_token={{ csrf_token() }}'
  };

  // Initialize CKEditor
  CKEDITOR.replace('my-editor', options);
</script>

@if (session('success'))
    <script>
        Swal.fire({
            title: "Thành công!",
            text: "{{ session('success') }}",
            icon: "success",
            confirmButtonText: "OK"
        });
    </script>
@endif

@endsection




