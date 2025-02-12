
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
      <th scope="col">Odo</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach($cars as $car)
    <tr>
      <th scope="row">{{$car -> id}}</th>
      <td>{{$car -> name}}</td>
      <td> {{number_format($car -> price_ngay) }} VND</td>
      <td> <img src="{{$car -> feature_image_path}}" alt="" srcset="" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;" ></td>
      <td> {{$car -> status}}</td>
      <td>  {{$car -> year}}</td>
      <td>  {{$car -> odo}} Km </td>
      <td>  {{ optional($car -> category)-> name}} </td>
      <td>
      <a class="btn btn-danger " href="{{ route('car.edit', ['id' => $car->id]) }}">
        Sửa
    </a>
        <button class="btn btn-danger btn-delete" data-url="{{ route('car.delete', ['id' => $car->id]) }}">
        Xóa
    </button>
      </td>
   
    </tr>
    @endforeach
  </tbody>
</table>
<div class="col-md-12">
{{ $cars->links('pagination::bootstrap-4') }}
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






