
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 


@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header' , ['name' => 'News' , 'key' => 'Edit'])
    <!-- /.content-header -->
    <div class="col-md-12">
      
    <form action="{{route('news.update', ['id' => $news->id])}}" method="post" enctype="multipart/form-data">
      @csrf

   
  <div class="form-group">
    <label >Tiêu đề</label>
    <input type="input" class="form-control" 
    name="title"
    value="{{$news->title}}"
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
  <div class="col-md-12">
    <div class="row">
        <img src="{{$news->image_path}}" alt="" style="width: 300px; height: 250px; object-fit: cover; border-radius: 8px;">
    </div>
  </div>



  <div class="form-group ">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea  name="description" rows="5" class="col-md-12">{{$news->description}}</textarea>
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="my-editor" id="my-editor" name="content" rows="5">{{$news->content}}</textarea>
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  
  <div class="form-group">
    <label>Chọn danh mục cha</label>
    <select name="id_categorynews" class="form-control">
        <option value="">Chọn danh mục</option>
        @foreach($newscategories as $newscategory)
            <option 
                value="{{ $newscategory->id }}" 
                @if($news->id_categorynews == $newscategory->id) selected @endif
            >
                {{ $newscategory->name }}
            </option>
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




