<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function index()
    {
        $wallets = Wallet::all();
        return view('wallets.index', compact('wallets'));
    }

    public function create()
    {
        $wallets = Wallet::all();
        return view('wallets.create', compact('wallets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'direct' => 'nullable|numeric',
            'business' => 'nullable|numeric',
            'poola' => 'nullable|numeric',
            'poolb' => 'nullable|numeric',
            'poolc' => 'nullable|numeric',
            'poold' => 'nullable|numeric',
            'poole' => 'nullable|numeric',
            'poolf' => 'nullable|numeric',
            'poolg' => 'nullable|numeric',
            'used' => 'nullable|numeric',
        ]);

        Wallet::create($request->all());

        return redirect()->route('wallets.index')
            ->with('success', 'Wallet created successfully.');
    }

    public function show(Wallet $wallet)
    {
        return view('wallets.show', compact('wallet'));
    }

}

        
        
            
