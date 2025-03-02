
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 


@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header' , ['name' => 'News' , 'key' => 'ADD'])
    <!-- /.content-header -->
    <div class="col-md-12">
      
    <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
      @csrf

   
  <div class="form-group">
    <label >Tiêu đề</label>
    <input type="input" class="form-control" 
    name="title"
    placeholder="Nhập tiêu đề" >
     @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>



  <div class="form-group">
    <label >Ảnh đại diện</label>
    <input type="file" class="form-control-file" 
    name="image_path"
    >
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>



  <div class="form-group ">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea  name="description" rows="5" class="col-md-12"></textarea>
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="my-editor" id="my-editor" name="content" rows="5"></textarea>
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  
  <div class="form-group">
    <label >Chọn danh mục cha</label>
    <select name="id_categorynews" class="form-control">
                <option value="">Chọn danh mục</option>
                @foreach($newscategories as $newscategory)
                    <option value="{{ $newscategory->id }}">{{ $newscategory->name }}</option>
                @endforeach
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




