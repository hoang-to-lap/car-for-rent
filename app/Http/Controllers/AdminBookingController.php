<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    //
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(10);
        return view('booking.index', compact('bookings'));
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus($id, Request $request)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }
}
