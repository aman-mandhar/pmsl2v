<?php

namespace App\Http\Controllers;

use App\Models\Retail;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class RetailController extends Controller
{
    // Display a listing of the stores.
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('warehouses.index', compact('warehouses'));
    }
    
}