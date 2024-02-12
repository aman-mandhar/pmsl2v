<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Stock;
use App\Models\Transfer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use AuthenticatesUsers;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use App\Models\ProductVariation;
use App\Models\Merchant;
use App\Models\Vendor;
use App\Models\Token;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class StockController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('search');
    
        $stocks = Stock::with(['items' => function ($query) use ($search) {
            $query->where('name', 'like', '%'.$search.'%')
                ->orWhereHas('categories', function ($categoryQuery) use ($search) {
                    $categoryQuery->where('name', 'like', '%'.$search.'%')
                        ->orWhereHas('subcategories', function ($subcategoryQuery) use ($search) {
                            $subcategoryQuery->where('name', 'like', '%'.$search.'%')
                                ->orWhereHas('variations', function ($variationQuery) use ($search) {
                                    $variationQuery->where('color', 'like', '%'.$search.'%');
                                });
                        });
                });
        }]);
    
        $stocks = $stocks->paginate(10);
    
        return view('stocks.index', ['stocks' => $stocks]);
    }

    public function index()
    {
        $stocks = Stock::with('items.categories.subcategories.variations')->get();
        return view('stocks.index', ['stocks' => $stocks]);
    }
    
    

    public function add(Request $request, $id)
    {
        // Retrieve the item
        $item = Item::findOrFail($id);
        
        // Retrieve all merchants
        $merchants = Merchant::all();
        
        // Retrieve the token for the item
        $token = Token::where('id', $item->token_id)->firstOrFail();
        
        // Get the values from the previous form submission
        $qty = $request->input('qty');
        $pur_value = $request->input('pur_value');
        $expences = $request->input('expences');
        $mrp = $request->input('mrp');
        $sale_price = $request->input('sale_price');
    
        // Create a new stock instance and populate it with the previous values
        $stock = new Stock();
        $stock->qty = $qty;
        $stock->pur_value = $pur_value;
        $stock->expences = $expences;
        $stock->mrp = $mrp;
        $stock->sale_price = $sale_price;
    
        // Calculations for token distribution
        $gst = $stock->pur_value * ($item->gst / 100);
        $gross_cost = $stock->pur_value + $stock->expences;
        $gross_profit = $stock->sale_price - $gross_cost;
        $spl_discount = $gross_profit * (30 / 100);
        $gst_sale = $gross_profit * ($item->gst / 100);
        $net_profit = $gross_profit - ($spl_discount + $gst_sale);
        $swh = $net_profit * ($token->sub_warehouse / 100);
        $swh_ref = $net_profit * ($token->sub_warehouse_ref / 100);
        $ret = $net_profit * ($token->retailer / 100);
        $ret_ref = $net_profit * ($token->retailer_ref / 100);
        $cust = $net_profit * ($token->customer / 100);
        $ref = $net_profit * ($token->referrer / 100);
    
        // Pass the item and stock to the view
        $data = [
            'item' => $item,
            'stock' => $stock,
            'merchants' => $merchants,
            'token' => $token,
            'gst' => $gst,
            'gross_cost' => $gross_cost,
            'gross_profit' => $gross_profit,
            'spl_discount' => $spl_discount,
            'gst_sale' => $gst_sale,
            'net_profit' => $net_profit,
            'swh' => $swh,
            'swh_ref' => $swh_ref,
            'ret' => $ret,
            'ret_ref' => $ret_ref,
            'cust' => $cust,
            'ref' => $ref,
        ];
    
        // Return the view with the item and stock data
        return view('stocks.add', $data);
    }
    
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'item_id' => 'required|exists:items,id',
            'weight' => 'nullable|nullable|numeric',
            'qty' => 'nullable|nullable'|'numeric',
            'pur_value' => 'required|numeric',
            'gst' => 'required',
            'mrp' => 'required|numeric',
            'expences' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'subwarehouse_tokens' => 'nullable|numeric',
            'subwarehouse_ref_tokens' => 'nullable|numeric',
            'sale_price' => 'required|numeric',
            'profit_before_discount_tokens' => 'reqired|numeric',
            'profit_after_discount_tokens' => 'reqired|numeric',
            'profit_after_tokens' => 'reqired|numeric',
            'pur_bill_pic' => 'nullable|string',
            'pur_bill_no' => 'required|string',
            'pur_date' => 'nullable|date',
            'merchant_id' => 'nullable|exists:merchants,id',
            'vendor_id' => 'nullable|exists:vendors,id',
            'qrcode' => 'nullable|string',
            'barcode' => 'nullable|string',
            'batch_no' => 'nullable|string',
            'mfg_date' => 'nullable|date',
            'exp_date' => 'nullable|date',
            'remarks' => 'nullable|string',
            'user_id' => 'required|exists:users,id',

        ]);
            

        // Ensure that weight and qty are not negative
        if ($request->has('weight') && $validatedData['weight'] < 0) {
            return redirect()->route('products.items.index')->with('success', 'Stock not added');
        }
        else {
            
            Stock::create($validatedData);
            return redirect()->route('products.items.index')->with('success', 'Stock added successfully');
        }

        }  
        public function show(Stock $stock)
        {
            $item = Item::findOrFail($stock->item_id)->get();
            $merchant = Merchant::findOrFail($stock->merchant_id)->get();
            $vendor = Vendor::findOrFail($stock->vendor_id)->get();
            $user = User::findOrFail($stock->user_id)->get();
            $category = ProductCategory::findOrFail($stock->item_id->category_id)->get();
            $subcategory = ProductSubcategory::findOrFail($stock->item_id->category_id->subcategory_id)->get(); 
            $variation = ProductVariation::findOrFail($stock->item_id->category_id->subcategory_id->variation_id)->get();   
            return view('stocks.show', [
                'stock' => $stock,
                'item' => $item,
                'merchant' => $merchant,
                'vendor' => $vendor,
                'user' => $user,
                'category' => $category,
                'subcategory' => $subcategory,
                'variation' => $variation,
            ]);
        }

        public function edit(Stock $stock)
        {
                $item = Item::findOrFail($stock->item_id)->get();
                $merchant = Merchant::findOrFail($stock->merchant_id)->get();
                $vendor = Vendor::findOrFail($stock->vendor_id)->get();
                $user = User::findOrFail($stock->user_id)->get();
                $category = ProductCategory::findOrFail($stock->item_id->category_id)->get();
                $subcategory = ProductSubcategory::findOrFail($stock->item_id->category_id->subcategory_id)->get(); 
                $variation = ProductVariation::findOrFail($stock->item_id->category_id->subcategory_id->variation_id)->get();
                $items = Item::all();
                return view('stocks.edit', [
                    'stock' => $stock, 
                    'items' => $items,
                    'item' => $item,
                    'merchant' => $merchant,
                    'vendor' => $vendor,
                    'user' => $user,
                    'category' => $category,
                    'subcategory' => $subcategory,
                    'variation' => $variation,
                ]);
    }

    public function update(Request $request, Stock $stock)
    {
        // Validate the request data as needed
        $validatedData = $request->validate([
            'item_id' => 'required|exists:items,id',
            'weight' => 'nullable|nullable|numeric',
            'qty' => 'nullable|nullable'|'numeric',
            'pur_value' => 'required|numeric',
            'gst' => 'required',
            'mrp' => 'required|numeric',
            'expences' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'subwarehouse_tokens' => 'nullable|numeric',
            'subwarehouse_ref_tokens' => 'nullable|numeric',
            'sale_price' => 'required|numeric',
            'profit_before_discount_tokens' => 'reqired|numeric',
            'profit_after_discount_tokens' => 'reqired|numeric',
            'profit_after_tokens' => 'reqired|numeric',
            'pur_bill_pic' => 'nullable|string',
            'pur_bill_no' => 'required|string',
            'pur_date' => 'nullable|date',
            'merchant_id' => 'nullable|exists:merchants,id',
            'vendor_id' => 'nullable|exists:vendors,id',
            'qrcode' => 'nullable|string',
            'barcode' => 'nullable|string',
            'batch_no' => 'nullable|string',
            'mfg_date' => 'nullable|date',
            'exp_date' => 'nullable|date',
            'remarks' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            // Add other validation rules for your fields
        ]);
        
        // Ensure that weight and qty are not negative
        if ($request->has('weight') && $validatedData['weight'] < 0) {
            return redirect()->route('stocks.index')->with('success', 'Stock not updated');
        }
        else {
            $stock->update($validatedData);
            return redirect()->route('stocks.index')->with('success', 'Stock updated successfully');
        }

    }

    public function destroy(Stock $stock)
    {
        // Delete the stock record
        $stock->delete();

        // Redirect to the index page or show a success message
        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully');
    }



        public function transfer($stockId)
        {
            // Retrieve the item details
            $stock = Stock::findOrFail($stockId);
            $subwarehouse = User::where('user_role', '=', '4')->get();
            $store = User::where('user_role', '=', '2')->get();
            $warehouse = User::where('user_role', '=', '3')->get();
            $user = Auth::user();
            return view('stocks.transfer', [
            'stock' => $stock,
            'subwarehouse' => $subwarehouse,
            'store' => $store,
            'warehouse' => $warehouse,
            'user' => $user,
        ]);
    }

    public function transferStore(Request $request, Stock $stock)
    {
        // Validate the request data as needed
        $validatedData = $request->validate([
            'stock_id' => 'required|exists:stocks,id',
            'item_id' => 'required|exists:items,id',
            'measure' => 'nullable|numeric',
            'tot_no_of_items' => 'nullable|integer',
            'points' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'status' => 'required|string',
            'user_id' => Auth::check() ? 'nullable|numeric' : 'nullable', // Updated validation rule
            // Add other validation rules for your fields
        ]);

        // Ensure that measure and tot_no_of_items are not negative
            if ($request->has('measure') && $validatedData['measure'] < 0) {
                return redirect()->route('stocks.index')->with('success', 'Stock transfered request not submitted');
            }

            if ($request->has('tot_no_of_items') && $validatedData['tot_no_of_items'] < 0) {
                return redirect()->route('stocks.index')->with('success', 'Stock transfered request not submitted');
            }

            if (Auth::check()) {
            $validatedData['user_id'] = Auth::id();
            } else {
            // Log or debug message to check if this block is executed
            return "No";
            }
    
        // Create a new stock entry
        $transfer = new Transfer($validatedData);
    
        // Save the stock entry
        $transfer->save();
    
        // Redirect to the desired route
        return redirect()->route('stocks.index')->with('success', 'Stock transfered request successfully submitted');
    }

    

}
