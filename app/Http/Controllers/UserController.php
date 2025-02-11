<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Hiển thị trang dashboard cho người dùng đã đăng nhập.
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Hiển thị trang dashbroad (nếu cần thiết).
     */
    public function dashbroad()
    {
        // Thay đổi nội dung view hoặc logic theo yêu cầu của bạn
        return view('dashbroad');
    }
}
