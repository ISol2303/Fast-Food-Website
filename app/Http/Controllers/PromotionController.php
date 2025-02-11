<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PromotionController extends Controller
{
    /**
     * Hiển thị danh sách các Promotion.
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotions.index', compact('promotions'));
    }

    /**
     * Hiển thị form tạo mới Promotion.
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Lưu trữ Promotion mới vào database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'promo_code'     => 'required|string|max:50|unique:promotions',
            'quantity'       => 'required|integer',
            'discount_value' => 'required|numeric',
            'start_date'     => 'required|date',
            'end_date'       => 'required|date|after_or_equal:start_date',
        ]);

        Promotion::create($validatedData);

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion đã được tạo thành công.');
    }

    /**
     * Hiển thị chi tiết một Promotion.
     */
    public function show(Promotion $promotion)
    {
        return view('admin.promotions.show', compact('promotion'));
    }

    /**
     * Hiển thị form chỉnh sửa Promotion.
     */
    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    /**
     * Cập nhật dữ liệu Promotion.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $validatedData = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'promo_code'     => 'required|string|max:50|unique:promotions,promo_code,' . $promotion->id,
            'quantity'       => 'required|integer',
            'discount_value' => 'required|numeric',
            'start_date'     => 'required|date',
            'end_date'       => 'required|date|after_or_equal:start_date',
        ]);

        $promotion->update($validatedData);

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion đã được cập nhật thành công.');
    }

    /**
     * Xóa Promotion.
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('admin.promotions.index')->with('success', 'Promotion đã được xóa thành công.');
    }
}