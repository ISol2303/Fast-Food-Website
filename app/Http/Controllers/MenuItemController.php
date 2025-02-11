<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MenuItemController extends Controller
{
    // Hiển thị danh sách món ăn
    public function index()
    {
        $menuItems = MenuItem::with('category')->get();
        return view('admin.menu_items.index', compact('menuItems'));
    }

    // Hiển thị form tạo món ăn mới
    public function create()
    {
        $categories = Category::all();
        return view('admin.menu_items.create', compact('categories'));
    }

    // Lưu món ăn mới
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:150',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'image_url'   => 'nullable|image', // validate file ảnh
            'category_id' => 'required|exists:categories,id',
            'is_active'   => 'required|boolean',
        ]);

        // Nếu có file được upload cho trường image_url
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            // Lưu file vào thư mục 'images' trên disk 'public'
            $path = $file->store('images', 'public');
            $data['image_url'] = $path;
        } else {
            $data['image_url'] = null;
        }

        MenuItem::create($data);

        return redirect()->route('menu_items.index')
                         ->with('success', 'Menu item created successfully.');
    }

    // Hiển thị form chỉnh sửa món ăn
    public function edit(MenuItem $menuItem)
    {
        $categories = Category::all();
        return view('admin.menu_items.edit', compact('menuItem', 'categories'));
    }

    // Cập nhật món ăn
    public function update(Request $request, MenuItem $menuItem)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:150',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'image_url'   => 'nullable|image', // validate file ảnh
            'category_id' => 'required|exists:categories,id',
            'is_active'   => 'required|boolean',
        ]);

        // Nếu có file được upload, xử lý tương tự
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $path = $file->store('images', 'public');
            $data['image_url'] = $path;
        }

        $menuItem->update($data);

        return redirect()->route('menu_items.index')
                         ->with('success', 'Menu item updated successfully.');
    }

    // Xóa món ăn
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('menu_items.index')
                         ->with('success', 'Menu item deleted successfully.');
    }
}