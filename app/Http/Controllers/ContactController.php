<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    /**
     * Hiển thị trang liên hệ với thông tin các chi nhánh.
     */
    public function index()
    {
        // Lấy tất cả thông tin của các Branch
        $branches = Branch::all();

        // Truyền dữ liệu vào view 'contact'
        return view('contact', compact('branches'));
    }
}