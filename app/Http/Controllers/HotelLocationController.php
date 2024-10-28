<?php

namespace App\Http\Controllers;

use App\Models\HotelLocation;
use Illuminate\Http\Request;

class HotelLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = HotelLocation::all();
        return view('admin.hotels.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hotels.location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|string',
            'city' => 'required|string|max:45',
            'postalCode' => 'required|string|max:45',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
        ]);

        // Menyimpan data hotel location baru
        HotelLocation::create($validatedData);
        return redirect()->route('admin.hotels.location.index')->with('success', 'Hotel location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.hotels.location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelLocation $location)
    {
        return view('admin.hotels.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelLocation $location)
    {
        // Validasi input
        $validatedData = $request->validate([
            'address' => 'required|string',
            'city' => 'required|string|max:45',
            'postalCode' => 'required|string|max:45',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
        ]);

        // Mengupdate data hotel location
        $location->update($validatedData);
        return redirect()->route('admin.hotels.location.index')->with('success', 'Hotel location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelLocation $location)
    {
        $location->delete();

        return redirect()->route('admin.hotels.location.index')->with('success', 'Hotel location deleted successfully.');
    }
}
