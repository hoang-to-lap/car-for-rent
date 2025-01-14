<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin(){
     
        return view('login');
    }
 


public function postAdmin(Request $request)
{
    // Kiểm tra dữ liệu đầu vào
    $request->validate([
        'username' => 'required|email',
        'password' => 'required',
    ]);

    // Kiểm tra thông tin đăng nhập
    if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
        // Lưu thông tin người dùng vào session
        $user = Auth::user(); 
        session(['user' => $user]); 
        
        
        return redirect()->route('home');
    }

    // Nếu đăng nhập thất bại
    return back()->withErrors(['login' => 'Thông tin đăng nhập không chính xác!'])->withInput();
}
   
public function logout(Request $request)
{
    Auth::logout();  // Đăng xuất người dùng
    $request->session()->invalidate();  // Hủy session
    $request->session()->regenerateToken();  // Regenerate CSRF token

    return redirect('/admin');  // Chuyển hướng về trang login
}
}
