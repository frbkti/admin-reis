<?php

namespace App\Http\Controllers;

use App\Models\HotelFacility;
use Illuminate\Http\Request;

class HotelFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = HotelFacility::all();
        return view('admin.hotels.faciliti.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hotels.faciliti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'FacilityName' => 'required|max:45',
        ]);

        HotelFacility::create($request->all());

        return redirect()->route('admin.hotels.faciliti.index')->with('success', 'Fasilitas  berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelFacility $facility)
    {
        return view('admin.hotels.faciliti.show', compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelFacility $facility)
    {
        return view('admin.hotels.faciliti.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelFacility $facility)
    {
        $request->validate([
            'FacilityName' => 'required|max:45',
        ]);

        $facility->update($request->all());

        return redirect()->route('admin.hotels.faciliti.index')->with('success', 'Fasilitas hotel berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelFacility $facility)
    {
        $facility->delete();

        return redirect()->route('admin.hotels.faciliti.index')->with('success', 'Fasilitas hotel berhasil dihapus.');
    }
}
