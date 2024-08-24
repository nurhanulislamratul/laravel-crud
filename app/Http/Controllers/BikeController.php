<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;

class BikeController extends Controller
{
    // Show the form for adding a new bike
    public function bike()
    {
        return view('add-new-bike');
    }

    // Handle form submission and save the new bike
    public function bikeCreate(Request $request)
    {
        $bike = [
            "file" => $request->image,
            "name" => $request->name,
            "brand" => $request->brand,
            "model" => $request->model,
            "year" => $request->year,
            "price" => $request->price,
            "description" => $request->description,
            "status" => $request->status,
        ];

        Bike::create($bike);

        return redirect()->route('bike-list')->with('success', 'Bike added successfully!');
    }

    public function bikeEdit($id)
    {
        $bike = Bike::findOrFail($id);
        return view('edit-bike', compact('bike'));
    }

    public function bikeList()
    {
        $bikes = Bike::all();
        return view('bike-list', compact('bikes'));
    }

    public function bikeUpdate(Request $request)
    {

        $bike = [
            "file" => $request->image,
            "name" => $request->name,
            "brand" => $request->brand,
            "model" => $request->model,
            "year" => $request->year,
            "price" => $request->price,
            "description" => $request->description,
            "status" => $request->status,
        ];

        Bike::where(['id' => $request->id])->update($bike);
        return redirect()->route('bike-list');
    }

    public function bikeDelete($id)
    {

        Bike::where(['id' => $id])->delete();
        return redirect()->back();
    }
}
