<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Display the welcome page with categories and menu items.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Retrieve all categories
        $categories = Category::all();

        // Check if a category filter is provided via query string (e.g., ?category=3)
        if ($request->has('category') && !empty($request->category)) {
            // Filter menu items by the selected category
            $menuItems = MenuItem::with('category')
                ->where('category_id', $request->category)
                ->get();
        } else {
            // Otherwise, get all menu items (you may optionally add filtering for active items)
            $menuItems = MenuItem::with('category')->get();
        }

        // Return the welcome view with categories and menu items
        return view('welcome', compact('categories', 'menuItems'));
    }
}