
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 
@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header',['name' => 'Slider' , 'key' => 'List'])
    <!-- /.content-header -->
     <div class="col-md-12 clearfix">
     
     <a href="{{ route('slider.create') }}" class="m-2 ml-auto btn btn-success float-right">Thêm</a>
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
      <th scope="col">Tên slide</th>
      <th scope="col">Description</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach($sliders as $slider)
    <tr>
      <th scope="row">{{$slider->id}}</th>
      <td>{{$slider->name}}</td>
      <td>{{$slider->description}}</td>
      <td><img src="{{$slider->image_path}}" alt="" srcset="" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;"></td>
      <td>
      <a class="btn btn-danger " href="{{ route('slider.edit', ['id' => $slider->id]) }}">
        Sửa
    </a>
        <button class="btn btn-danger btn-delete" data-url="{{ route('slider.delete', ['id' => $slider->id]) }}">
        Xóa
    </button>
      </td>
   
    </tr>
  
    @endforeach
  </tbody>
</table>
<div class="col-md-12">
{{ $sliders->links('pagination::bootstrap-4') }}
</div>
</div>

   
    
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            let url = this.getAttribute('data-url');
            
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
                text: "Hành động này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, xóa nó!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
</script>
@stop
 
    <!-- /.content -->
  </div>
@stop






