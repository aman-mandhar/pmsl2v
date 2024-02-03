<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubwarehouseStock;
use App\Models\Stock;
use App\Models\Subwarehouse;
use App\Models\Warehouse;

class SubwarehouseStockController extends Controller
{
    public function index()
    {
        $subwarehouseStocks = SubwarehouseStock::all();
        $subwarehouses = Subwarehouse::all();
        $stocks = Stock::all();
        $warehouses = Warehouse::all();
        
        return view('subwarehouses.stocks.index', compact('subwarehouseStocks', 'subwarehouses', 'stocks', 'warehouses'));
    }

    public function create()
    {
        $stocks = Stock::all();
        $subwarehouses = Subwarehouse::all();
        $warehouses = Warehouse::all();
        
        return view('subwarehouses.stocks.create', compact('stocks', 'subwarehouses', 'warehouses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stock_id' => 'required',
            'subwarehouse_id' => 'required',
            'qty' => 'required',
            'weight' => 'required',
        ]);

        SubwarehouseStock::create($request->all());

        return redirect()->route('subwarehouseStocks.index')
            ->with('success', 'Subwarehouse stock created successfully.');
    }

    public function show(SubwarehouseStock $subwarehouseStock)
    {
        return view('subwarehouses.stocks.show', compact('subwarehouseStock'));
    }

    public function edit(SubwarehouseStock $subwarehouseStock)
    {
        $stocks = Stock::all();
        $subwarehouses = Subwarehouse::all();
        $warehouses = Warehouse::all();

        return view('subwarehouses.stocks.edit', compact('subwarehouseStock', 'stocks', 'subwarehouses', 'warehouses'));
    }

    public function update(Request $request, SubwarehouseStock $subwarehouseStock)
    {
        $request->validate([
            'stock_id' => 'required',
            'subwarehouse_id' => 'required',
            'qty' => 'required',
            'weight' => 'required',
        ]);
        $subwarehouseStock->update($request->all());

        return redirect()->route('subwarehouseStocks.index')
            ->with('success', 'Subwarehouse stock updated successfully');
    }

    public function destroy(SubwarehouseStock $subwarehouseStock)
    {
        $subwarehouseStock->delete();

        return redirect()->route('subwarehouseStocks.index')
            ->with('success', 'Subwarehouse stock deleted successfully');
    }

}
