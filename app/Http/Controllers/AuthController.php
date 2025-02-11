<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class AuthController extends Controller
{
    /**
     * Hiển thị form đăng nhập.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Xử lý đăng nhập.
     */
    public function login(Request $request)
    {
        // Validate dữ liệu đầu vào
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cố gắng đăng nhập với thông tin cung cấp (với tùy chọn ghi nhớ nếu có)
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Làm mới session để bảo vệ phiên làm việc
            $request->session()->regenerate();

            $user = Auth::user();

            // Kiểm tra nếu user có role admin (role = 1) thì chuyển hướng đến trang admin
            if ($user->role === 1) {
                return redirect()->intended('/admin/categories');
            }

            // Ngược lại chuyển hướng về trang chủ hoặc trang user
            return redirect()->intended('/');
        }

        // Nếu đăng nhập thất bại, trả về trang đăng nhập với thông báo lỗi
        return back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác'])->withInput();
    }

    /**
     * Xử lý đăng xuất.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Xóa session và tái tạo token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Hiển thị form đăng ký.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Xử lý đăng ký.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Gửi email chào mừng
        Mail::to($user->email)->send(new WelcomeMail($user));

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registration successful! Welcome email sent.');
    }
}