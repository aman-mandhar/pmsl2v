<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
  public function index()
  {
    $cities = City::all();
    return view('cities.index', ['cities' => $cities]);
  }

    public function create()
    {
        return view('cities.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'user_given_name' => 'nullable|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect('cities/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $city = City::create($request->all());

        return redirect('cities');
    }

    public function show($id)
    {
        $city = City::find($id);
        return view('cities.show', ['city' => $city]);
    }

    public function edit($id)
    {
        $city = City::find($id);
        return view('cities.edit', ['city' => $city]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'user_given_name' => 'nullable|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect('cities/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $city = City::find($id);
        $city->name = $request->get('name');
        $city->user_given_name = $request->get('user_given_name');
        $city->user_id = $request->get('user_id');
        $city->save();

        return redirect('cities');
    }

    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();

        return redirect('cities');
    }

    public function getCityName(Request $request)
    {
        $cityId = $request->input('cityId');
        $city = City::find($cityId);

        return response()->json(['name' => $city ? $city->name : null]);
    }

    public function getCityUserGivenName(Request $request)
    {
        $cityId = $request->input('cityId');
        $city = City::find($cityId);

        return response()->json(['user_given_name' => $city ? $city->user_given_name : null]);
    }

    public function getCityUserId(Request $request)
    {
        $cityId = $request->input('cityId');
        $city = City::find($cityId);

        return response()->json(['user_id' => $city ? $city->user_id : null]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $cities = City::where('name', 'like', '%' . $search . '%')->with('user_given_name', 'like', '%' . $search . '%')->get();

        return view('cities.index', ['cities' => $cities]);
    }

    

    
}
