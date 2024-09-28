<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function indexproduct() {
        $data['products'] = Product::where('status', 1)->orderBy('id', 'desc')->paginate(50);
        $data['categories'] = Category::all();
        return view('backend.product.index', $data);
    }
    public function inactiveproduct() {
        $data['products'] = Product::where('status', 2)->orderBy('id', 'desc')->paginate(50);
        $data['categories'] = Category::all();
        return view('backend.product.incative', $data);
    }
    
    public function createproduct() {
        $data['categories'] = Category::all();
        $data['subcategories'] = SubCategory::all();
        return view('backend.product.create', $data);
    }
    public function storeproduct(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'modeles_id' => 'required|exists:modeles,id',
            'type_id' => 'required|exists:types,id',
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id',
            'certification_id' => 'required|exists:certifications,id',
            'purchase_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'retail_price' => 'required|numeric',
            'stock_qty' => 'required|integer',
            'vat' => 'required|numeric',
            'tax' => 'required|numeric',
            'desc' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        try {
            // Create a new product and assign form data
            $product = new Product();
            $product->name = $request->name;
            $product->brand_id = $request->brand_id;
            $product->modeles_id = $request->modeles_id;
            $product->type_id = $request->type_id;
            $product->size_id = $request->size_id;
            $product->color_id = $request->color_id;
            $product->certification_id = $request->certification_id;
            $product->purchase_price = $request->purchase_price;
            $product->wholesale_price = $request->wholesale_price;
            $product->retail_price = $request->retail_price;
            $product->stock_qty = $request->stock_qty;
            $product->vat = $request->vat;
            $product->tax = $request->tax;
            $product->desc = $request->desc; // Optional field

            // Save the product
            $product->save();

            // Redirect to the product index page with success message
            return redirect()->route('product.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            // Redirect to the product index page with error message
            return redirect()->route('product.index')->with('error', 'An error occurred. Please try again.');
        }
    }


    public function editproduct($id = null) {
        $products['product'] = Product::find($id);
        $products['categories'] = Category::all();
        
        if (!$products['product']) {
            return redirect()->back();
        }
        
        return view('backend.product.edit', $products);
    }
    
    public function updateproduct(Request $request, $id): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'modeles_id' => 'required|exists:modeles,id',
            'type_id' => 'required|exists:types,id',
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id',
            'certification_id' => 'required|exists:certifications,id',
            'purchase_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'retail_price' => 'required|numeric',
            'stock_qty' => 'required|integer',
            'vat' => 'required|numeric',
            'tax' => 'required|numeric',
            'desc' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status' => 'required|in:1,2',
        ]);

        try {
            // Find the existing product
            $product = Product::findOrFail($id);

            // Update the product data
            $product->name = $request->input('name');
            $product->brand_id = $request->input('brand_id');
            $product->modeles_id = $request->input('modeles_id');
            $product->type_id = $request->input('type_id');
            $product->size_id = $request->input('size_id');
            $product->color_id = $request->input('color_id');
            $product->certification_id = $request->input('certification_id');
            $product->purchase_price = $request->input('purchase_price');
            $product->wholesale_price = $request->input('wholesale_price');
            $product->retail_price = $request->input('retail_price');
            $product->stock_qty = $request->input('stock_qty');
            $product->vat = $request->input('vat');
            $product->tax = $request->input('tax');
            $product->desc = $request->input('desc');
            $product->status = $request->input('status');

            // Save the updated product data
            $product->save();

            // Redirect to the product index page with success message
            return redirect()->route('product.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            // Handle errors and redirect with an error message
            return redirect()->route('product.index')->with('error', 'An error occurred. Please try again.');
        }
    }

}
