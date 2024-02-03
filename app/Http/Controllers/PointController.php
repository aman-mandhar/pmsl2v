<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Point;


class PointController extends Controller
{
    public function index()
    {
        $points = Point::all();
        return view('points.index', compact('points'));
    }

    public function create()
    {
        return view('points.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required',
        'values_in' => 'required',
        'discount' => 'required',
        'points_employee' => 'nullable',
        'points_ref_employee' => 'nullable',
        'points_retailer' => 'nullable',
        'points_ref_retailer' => 'nullable',
        'points_warehouse' => 'nullable',
        'points_ref_warehouse' => 'nullable',
        'points_sub_warehouse' => 'nullable',
        'points_ref_sub_warehouse' => 'nullable',
        'points_merchant' => 'nullable',
        'points_ref_merchant' => 'nullable',
        'points_vendor' => 'nullable',
        'points_ref_vendor' => 'nullable',
        'points_transporter' => 'nullable',
        'points_ref_transporter' => 'nullable',
        'points_delivery_partner' => 'nullable',
        'points_ref_delivery_partner' => 'nullable',
        'points_business_promoter' => 'nullable',
        'points_ref_business_promoter' => 'nullable',
        'points_customer' => 'required',
        'points_referrer' => 'required',
        ]);
        Point::create($request->all());
        return redirect()->route('points.index')->with('success', 'Point created successfully.');
    }

    public function show(Point $point)
    {
        return view('points.show', compact('point'));
    }

    public function edit(Point $point)
    {
        return view('points.edit', compact('point'));
    }   

    public function update(Request $request, Point $point)
    {
        $request->validate([
        'title' => 'required',
        'values_in' => 'required',
        'discount' => 'required',
        'points_employee' => 'nullable',
        'points_ref_employee' => 'nullable',
        'points_retailer' => 'nullable',
        'points_ref_retailer' => 'nullable',
        'points_warehouse' => 'nullable',
        'points_ref_warehouse' => 'nullable',
        'points_sub_warehouse' => 'nullable',
        'points_ref_sub_warehouse' => 'nullable',
        'points_merchant' => 'nullable',
        'points_ref_merchant' => 'nullable',
        'points_vendor' => 'nullable',
        'points_ref_vendor' => 'nullable',
        'points_transporter' => 'nullable',
        'points_ref_transporter' => 'nullable',
        'points_delivery_partner' => 'nullable',
        'points_ref_delivery_partner' => 'nullable',
        'points_business_promoter' => 'nullable',
        'points_ref_business_promoter' => 'nullable',
        'points_customer' => 'required',
        'points_referrer' => 'required',
        ]);
        $point->update($request->all());
        return redirect()->route('points.index')->with('success', 'Point updated successfully.');
    }   

    public function destroy(Point $point)
    {
        $point->delete();
        return redirect()->route('points.index')->with('success', 'Point deleted successfully.');
    }   

    
}


   