<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BranchController extends Controller
{
    /**
     * Hiển thị danh sách các Branch.
     */
    public function index()
    {
        $branches = Branch::all();
        return view('admin.branches.index', compact('branches'));
    }

    /**
     * Hiển thị form tạo mới Branch.
     */
    public function create()
    {
        return view('admin.branches.create');
    }

    /**
     * Lưu trữ Branch mới vào database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'            => 'required|string|max:255',
            'address'         => 'required|string',
            'phone'           => 'required|string|max:50',
            'operating_hours' => 'required|string|max:100',
            'latitude'        => 'nullable|numeric',
            'longitude'       => 'nullable|numeric',
        ]);

        Branch::create($validatedData);

        return redirect()->route('branches.index')->with('success', 'Branch has been created successfully.');
    }

    /**
     * Hiển thị chi tiết Branch.
     */
    public function show(Branch $branch)
    {
        return view('admin.branches.show', compact('branch'));
    }

    /**
     * Hiển thị form chỉnh sửa Branch.
     */
    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    /**
     * Cập nhật dữ liệu Branch.
     */
    public function update(Request $request, Branch $branch)
    {
        $validatedData = $request->validate([
            'name'            => 'required|string|max:255',
            'address'         => 'required|string',
            'phone'           => 'required|string|max:50',
            'operating_hours' => 'required|string|max:100',
            'latitude'        => 'nullable|numeric',
            'longitude'       => 'nullable|numeric',
        ]);

        $branch->update($validatedData);

        return redirect()->route('branches.index')->with('success', 'Branch has been updated successfully.');
    }

    /**
     * Xóa Branch.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')->with('success', 'Branch has been deleted successfully.');
    }
}