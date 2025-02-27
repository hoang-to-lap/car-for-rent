
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 
@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header',['name' => 'News Category' , 'key' => 'List'])
    <!-- /.content-header -->
     <div class="col-md-12 clearfix">
     
     <a href="{{ route('newscategory.create') }}" class="m-2 ml-auto btn btn-success float-right">Thêm</a>
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
  @foreach($newsCategories as $newsCategory)
    <tr>
      <th scope="row">{{$newsCategory -> id}}</th>
      <td>{{$newsCategory -> name}}</td>
      <td>
        <a href="{{route('newscategory.edit' , ['id' => $newsCategory -> id])}}" class="btn btn-default">Sửa</a>
        <button class="btn btn-danger btn-delete" data-url="{{ route('newscategory.delete', ['id' => $newsCategory -> id]) }}">
        Xóa
    </button>
      </td>
   
    </tr>
  
    @endforeach
  </tbody>
</table>
<div class="col-md-12">
{{ $newsCategories->links('pagination::bootstrap-4') }}
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






