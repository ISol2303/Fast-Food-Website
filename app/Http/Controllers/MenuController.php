<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Routing\Controller;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        // Tạo query với điều kiện cơ bản
        $query = MenuItem::query()->where('is_active', 1);

        // Nếu có tham số tìm kiếm, lọc theo tên món ăn
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Nếu có lọc theo category, thêm điều kiện
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $menuItems = $query->get();

        return view('menu.index', compact('categories', 'menuItems'));
    }
}