<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'active')->paginate(8);
        $categories = Category::all();
        return view('front.products', compact('products', 'categories'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('status', 'active')->where('category_id', $category->id)->paginate(8);
        return view('front.products.category', compact('products', 'category'));
    }

    public function show($slug)
    {
        $product = Product::with('images')->where('slug', $slug)->firstOrFail();
        
        return view('front.product_details', compact('product'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect()->back();
        }

        // Search for products matching either ar_name or en_name
        $product = Product::where('ar_name', 'like', '%' . $query . '%')
            ->orWhere('en_name', 'like', '%' . $query . '%')
            ->where('status', 'active')
            ->first();

        if ($product) {
            // Redirect to the product page if found
            return redirect()->route('products.show', $product->slug);
        } else {
            // Redirect back with an error message if no product is found
            return redirect()->back();
        }
    }
}
