<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit()
    {
        $setting = Setting::first(); 
        return view('setting.edit_setting', compact('setting'));
    }
    public function update(Request $request)
{
    $request->validate([
        'site_name' => 'required|string|max:255',
        'address'   => 'required|string|max:255',
        'phone'     => 'required|string|max:20',
        'email'     => 'required|email|max:255',
        'content' => 'required|string',
        'company_info' => 'required|string',
    ]);

    $setting = Setting::first();
    $setting->update([
        'site_name' => $request->site_name,
        'address'   => $request->address,
        'phone'     => $request->phone,
        'email'     => $request->email,
        'content' => $request->content,         
        'company_info' => $request->company_info 
    ]);

    return redirect()->back()->with('success', 'Cập nhật thành công!');
}
}
