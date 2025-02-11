<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\UserController;

// Các route dành cho khách (chưa đăng nhập)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});

// Các route dành cho người dùng đã đăng nhập
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Các route public
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Optionally, if you implement removal functionality:
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

// Các route Admin (với middleware auth)
Route::prefix('admin')->middleware('auth')->group(function () {
    // Routes cho quản lý Danh mục (Categories)
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Routes cho quản lý Món ăn (Menu Items)
    Route::get('menu_items', [MenuItemController::class, 'index'])->name('menu_items.index');
    Route::get('menu_items/create', [MenuItemController::class, 'create'])->name('menu_items.create');
    Route::post('menu_items', [MenuItemController::class, 'store'])->name('menu_items.store');
    Route::get('menu_items/{menu_item}/edit', [MenuItemController::class, 'edit'])->name('menu_items.edit');
    Route::put('menu_items/{menu_item}', [MenuItemController::class, 'update'])->name('menu_items.update');
    Route::delete('menu_items/{menu_item}', [MenuItemController::class, 'destroy'])->name('menu_items.destroy');

    // Resource route cho Promotion (chỉ có admin mới truy cập)
    Route::get('promotions', [PromotionController::class,'index'])->name('promotions.index');
    Route::get('promotions/create', [PromotionController::class,'create'])->name('promotions.create');
    Route::post('promotions', [PromotionController::class, 'store'])->name('promotions.store');
    Route::get('promotions/{promotions}/edit', [PromotionController::class, 'edit'])->name('promotions.edit');
    Route::put('promotions/{promotions}', [PromotionController::class, 'update'])->name('promotions.update');
    Route::get('promotions/show', [PromotionController::class,'show'])->name('promotions.show');

    Route::get('branches', [BranchController::class, 'index'])->name('branches.index');
    Route::get('branches/create', [BranchController::class, 'create'])->name('branches.create');
    Route::post('branches', [BranchController::class, 'store'])->name('branches.store');
    Route::get('branches/{branch}', [BranchController::class, 'show'])->name('branches.show');
    Route::get('branches/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit');
    Route::put('branches/{branch}', [BranchController::class, 'update'])->name('branches.update');
    Route::delete('branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');

    // Routes cho quản lý Đơn hàng (Orders)
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});
Route::middleware(['auth'])->group(function () {
    // Hiển thị form chỉnh sửa hồ sơ
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Xử lý cập nhật hồ sơ
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

// Route cho trang Contact (public)
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/send-email', [MailController::class,'sendEmail']);