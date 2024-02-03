<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubwarehouseStock;
use App\Models\RetailerStock;
use App\Models\Stock;
use App\Models\Retail;
use App\Models\Subwarehouse;
use App\Models\Item;


class RetailerStockController extends Controller
{
    public function index()
    {
        $retailerstocks = RetailerStock::all();
        $retails = Retail::all();
        $subwarehouses = Subwarehouse::all();

        return view('retails.stocks.index', compact('retailerstocks', 'retails', 'subwarehouses'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $items = Item::where('name', 'LIKE', '%'.$search.'%')->get();
        return view('retails.stocks.requirement', compact('items', 'search'));
    
    }

    public function stockrequirement()
    {
        $items = Item::all();

        return view('retails.stocks.requirement', compact('retailerstocks', 'retails', 'subwarehouses', 'stocks', 'subwarehousestocks'));
    }

    public function create(item $item)
    {
        $stock = Stock::where('item_id', $item->id);
                
        return view('retails.stocks.create', compact('stock'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stock_id' => 'required',
            'retailer_id' => 'required',
            'qty' => 'required',
            'weight' => 'required',
            'subwarehouse_id' => 'required',
        ]);

        RetailerStock::create($request->all());

        return redirect()->route('retailerStocks.index')
            ->with('success', 'Retailer stock created successfully.');
    }

    public function show(RetailerStock $retailerStock)
    {
        return view('retails.stocks.show', compact('retailerStock'));
    }

    public function edit(RetailerStock $retailerStock)
    {
        return view('retails.stocks.edit', compact('retailerStock'));
    }

    public function update(Request $request, RetailerStock $retailerStock)
    {
        $request->validate([
            'stock_id' => 'required',
            'retailer_id' => 'required',
            'qty' => 'required',
            'weight' => 'required',
            'subwarehouse_id' => 'required',
        ]);

        $retailerStock->update($request->all());

        return redirect()->route('retailerStocks.index')
            ->with('success', 'Retailer stock updated successfully');
    }

    public function destroy(RetailerStock $retailerStock)
    {
        $retailerStock->delete();

        return redirect()->route('retailerStocks.index')
            ->with('success', 'Retailer stock deleted successfully');
    }

}
