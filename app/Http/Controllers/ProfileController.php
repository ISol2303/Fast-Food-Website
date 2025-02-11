<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Hiển thị form chỉnh sửa hồ sơ
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        // Validate dữ liệu nhập vào
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // Lấy người dùng hiện tại
        $user = Auth::user();

        // Thêm PHPDoc để chỉ định rõ kiểu của biến $user
        /** @var \App\Models\User $user */
        $user->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('profile.edit')->with('success', 'Hồ sơ của bạn đã được cập nhật thành công.');
    }
}