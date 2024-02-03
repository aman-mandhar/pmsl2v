<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class SubcategoryController extends Controller
{
    public function search(Request $request)
    {
    $search = $request->input('search');

    $subcategories = Productsubcategory::where('name', 'like', '%' . $search . '%')
        ->orWhere('description', 'like', '%' . $search . '%')
        ->get();

    return view('products.subcategories.create', compact('subcategories'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        $subcategories = ProductSubcategory::all();
        return view('products.subcategories.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        ProductSubcategory::create($request->all());

        return redirect()->route('products.subcategories.create')->with('success', 'Subcategory created successfully');
    }

    public function edit(ProductSubcategory $subcategory)
    {
        
        $category = ProductCategory::find($subcategory->category_id);
        $categories = ProductCategory::all();
        return view('products.subcategories.edit', compact('category', 'subcategory', 'categories'));
    }

    public function update(Request $request , ProductSubcategory $subcategory)
    {
        if ($request == null) {
            return redirect()->route('products.subcategories.create')->with('error', 'Subcategory not found');
        }
        else
        {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $subcategory->image = $imageName;
        }
       

        $subcategory->update($request->all());

        return redirect()->route('products.subcategories.create')->with('success', 'Subcategory updated successfully');
    
    }
        public function destroy(ProductSubcategory $subcategory)
        {
        $subcategory->delete();

        return redirect()->route('products.subcategories.index')->with('success', 'Subcategory deleted successfully');
        }
}

