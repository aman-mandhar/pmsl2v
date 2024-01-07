<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bp;
use App\Models\User;


class BpController extends Controller
{
    // Display a listing of the stores.
    public function index()
    {
        $bps = Bp::all();
        return view('bps.index', compact('bps'));
    }

    // Show the form for creating a new store.
    public function create()
    {
        $users = User::all();
        return view('bps.create', compact('users'));
    }

    // Store a newly created store in the database.
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'add' => 'required|string',
            'city' => 'required|string',
            'promoter_name' => 'required|string',
            'mobile_no' => 'required|string|size:10',
            'email' => 'required|email',
        ]);

        Bp::create($request->all());

        return redirect()->route('bps.index')->with('success', 'Bp store created successfully!');
    }

    // Display the specified store.
    public function show(Bp $bp)
    {
        return view('bps.show', compact('bp'));
    }

    // Show the form for editing the specified store.
    public function edit(Bp $bp)
    {
        $users = User::all();
        return view('bps.edit', compact('bp', 'users'));
    }

    // Update the specified store in the database.
    public function update(Request $request, Bp $bp)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'add' => 'required|string',
            'city' => 'required|string',
            'promoter_name' => 'required|string',
            'mobile_no' => 'required|string|size:10',
            'email' => 'required|email',
        ]);

        $bp->update($request->all());

        return redirect()->route('bps.index')->with('success', 'Bp store updated successfully!');
    }

    // Remove the specified store from the database.
    public function destroy(Bp $bp)
    {
        $bp->delete();

        return redirect()->route('bps.index')->with('success', 'Bp store deleted successfully!');
    }
}
