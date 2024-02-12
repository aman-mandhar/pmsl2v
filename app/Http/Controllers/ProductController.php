<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use App\Models\ProductVariation;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('products.items.index', ['items' => $items]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
    
        $items = Item::where('items.name', 'like', '%'.$search.'%')->get();

                
                
    
          
        return view('products.items.index', ['items' => $items]);
    }

    public function showAllData()
    {
        // Fetch all categories with their subcategories and variations
        $items = Item::with('categories.subcategories.variations')->get();

        return view('products.all', compact('items'));
    }

    public function getSubcategories($category)
    {
        $subcategories = ProductSubcategory::where('category_id', $category)->get();

        $options = '<option value="">Select Sub-Category</option>';
        foreach ($subcategories as $subcategory) {
            $options .= '<option value="' . $subcategory->id . '">' . $subcategory->name . '</option>';
        }

        return $options;
    }

    public function getVariations($subcategory)
    {
        $variations = ProductVariation::where('subcategory_id', $subcategory)->get();

        $options = '<option value="">Select Variation</option>';
        foreach ($variations as $variation) {
            $options .= '<option value="' . $variation->id . '">' . $variation->color . ' - ' . $variation->size . '</option>';
        }

        return $options;
    }


    public function create()
    {
        $categories = ProductCategory::all();
        $tokens = Token::all();

        return view('products.items.create', compact('categories','tokens'));
    }

    public function store(Request $request)
    {
    if ($request == null){
        return redirect()->route('products.items.index')->with('error', 'Product not created');
    }
    else if($request != null)
    {
    $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'prod_pic' => 'nullable',
        'type' => 'required|in:Pack,Loose',
        'gst' => 'required',
        'category_id' => 'required',
        'subcategory_id' => 'nullable',
        'variation_id' => 'nullable',
        'token_id' => 'nullable',
    ]);

    Item::create($request->all());
    }
    

    return redirect()->route('products.items.index')->with('success', 'Product created successfully');
    }

    public function show(Item $item)
    {
        $product = Item::with('categories.subcategories.variations')->find($item->id);
        return view('products.items.show', compact('item', 'product'));
    }

    public function edit(Item $item)
    {
        $categories = ProductCategory::all();
        $subcategories = ProductSubcategory::all();
        $variations = ProductVariation::all();
        $tokens = Token::all();

        return view('products.items.edit', compact('item', 'categories', 'subcategories', 'variations', 'tokens'));
    }

    public function update(Request $request, Item $item)
    {
        if ($request == null){
            return redirect()->route('products.items.index')->with('error', 'Product not created');
        }
        else if($request != null)
        {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'prod_pic' => 'nullable',
            'type' => 'required|in:Pack,Loose',
            'gst' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'variation_id' => 'nullable',
            'token_id' => 'nullable',
            'prod_pic' => 'nullable',
        ]);
        }
        $item->update($request->all());

        return redirect()->route('products.items.index')->with('success', 'Product updated successfully');
    }

    


    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('products.items.index')->with('success', 'Product deleted successfully');
    }
}
