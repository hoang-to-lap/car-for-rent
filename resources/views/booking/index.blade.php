
@extends('layouts.admin')
 
@section('title')
 <title>Trang chu</title>
@stop
 
@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials.content-header',['name' => 'Booking' , 'key' => 'List'])
    <!-- /.content-header -->
     <div class="col-md-12 clearfix">
     
     
     </div>
   
<div class="col-md-12">
<h2 class="mb-4">Danh sách đơn hàng</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
  <thead class="thead-light">
  <tr>
                <th>#</th>
                <th>Họ tên</th>
                <th>Số điện thoại</th>
                <th>Xe đã thuê</th>
                <th>Hình ảnh</th>
                <th>Thời gian thuê</th>
                <th>Địa điểm nhận xe</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
  </thead>
  <tbody>
  @foreach($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->customer_name }}</td>
                    <td>{{ $booking->phone_number }}</td>
                    <td>
                        @if($booking->car)
                            
                        
                            {{ $booking->car->name }}
                        @else
                            <span class="text-danger">Không có thông tin xe</span>
                        @endif
                    </td>
                    <td><img src="{{$booking->car->feature_image_path }}" alt="Hình ảnh xe" width="80"></td>
                    <td>{{ $booking->start_date }} - {{ $booking->end_date }}</td>
                    <td>{{ $booking->pickup_location }}</td>
                    <td>
                        <span class="badge {{ $booking->status == 'approved' ? 'badge-success' : 'badge-warning' }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('bookings.update-status', $booking->id) }}" method="POST">
                            @csrf
                            <select name="status" class="form-control d-inline w-auto">
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Chờ duyệt</option>
                                <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>Duyệt</option>
                                <option value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>Hủy</option>
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                        </form>
                    </td>
                </tr>
            @endforeach
  </tbody>
</table>
<div class="col-md-12">
{{ $bookings->links('pagination::bootstrap-4') }}
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






