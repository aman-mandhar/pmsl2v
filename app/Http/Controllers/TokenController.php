<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;

class TokenController extends Controller
{
    public function index()
    {
        $tokens = Token::all();
        return view('tokens.index', compact('tokens'));
    }

    public function create()
    {
        return view('tokens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required',
        'values_in' => 'required',
        'discount' => 'required',
        'retailer' => 'nullable',
        'retailer_ref' => 'nullable',
        'sub_warehouse' => 'nullable',
        'sub_warehouse_ref' => 'nullable',
        'merchant' => 'nullable',
        'merchant_ref' => 'nullable',
        'vendor' => 'nullable',
        'vendor_ref' => 'nullable',
        'customer' => 'required',
        'referrer' => 'required',
        ]);
        Token::create($request->all());
        return redirect()->route('tokens.index')->with('success', 'Token created successfully.');
    }

    public function show(Token $token)
    {
        return view('tokens.show', compact('token'));
    }

    public function edit(Token $token)
    {
        return view('tokens.edit', compact('token'));
    }

    public function update(Request $request, Token $token)
    {
        $request->validate([
        'title' => 'required',
        'values_in' => 'required',
        'discount' => 'required',
        'retailer' => 'nullable',
        'retailer_ref' => 'nullable',
        'sub_warehouse' => 'nullable',
        'sub_warehouse_ref' => 'nullable',
        'merchant' => 'nullable',
        'merchant_ref' => 'nullable',
        'vendor' => 'nullable',
        'vendor_ref' => 'nullable',
        'customer' => 'required',
        'referrer' => 'required',
        ]);
        $token->update($request->all());
        return redirect()->route('tokens.index')->with('success', 'Token updated successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $tokens = Token::where('title', 'like', '%'.$search.'%')->paginate(8);
        return view('tokens.index', compact('tokens'));
    }

    public function destroy(Token $token)
    {
        $token->delete();
        return redirect()->route('tokens.index')->with('success', 'Token deleted successfully.');
    }

}
