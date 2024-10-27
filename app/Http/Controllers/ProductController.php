<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();
        
        // Pass the products data to the view
        return view('products.index', compact('products'));
    }

    public function deleteClothFromDb()
    {
        // Fetch all products from the database
        $products = Product::all();
        
        // Pass the products data to the view
        return view('product_admin.delete-cloth', compact('products'));
    }

    // Method to delete a product
    public function destroy($id)
    {
        // Find the product by ID and delete it
        $product = Product::findOrFail($id);
        $product->delete();

        // Redirect back to the delete/edit page with a success message
        return redirect()->route('delete.cloth.from.db')->with('success', 'Product removed successfully.');
    }

    
    public function showAddProductForm()
    {
        return view('product_admin.add-product');
    }

    
    // Handle the form submission to add a new product
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'price' => 'required|numeric',
            'size' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'picture' => 'required|image|mimes:jpg,jpeg,png|max:2048', // validate image
            'description' => 'required|string|max:255',
            'stock_quantity' => 'required|integer',
        ]);

        // Handle the file upload
        $path = '';
        if ($request->file('picture')) {
        // Store the file in the public/product_image directory
            $path = $request->file('picture')->store('product_image', 'public');
        }

        // Create a new product in the database
        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'size' => $request->input('size'),
            'color' => $request->input('color'),
            'picture' => $path,
            'description' => $request->input('description'),
            'stock_quantity' => $request->input('stock_quantity'),
        ]);

        return redirect()->route('delete.cloth.from.db')->with('success', 'Product added successfully.');
    }
}
