<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display all products on the admin dashboard.
     */
    public function index()
    {
        // Get all products (menus)
        $menus = Menu::all();
        
        // Send product data to the view
        return view('admin', compact('menus'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for the image
        ]);

        // Store the uploaded image
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('img', $imageName, 'public');

        // Create the new menu item
        Menu::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    /**
     * Delete a product by ID.
     */
    public function destroy($id)
    {
        // Find the product by ID or fail
        $menu = Menu::findOrFail($id);

        // Delete the product
        $menu->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}