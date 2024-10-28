<?php

namespace App\Http\Controllers;

use App\Models\VillaresortFacility;
use Illuminate\Http\Request;

class VillaresortFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua data fasilitas
        $facilities = VillaresortFacility::all();
        return view('admin.villaresort.faciliti.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambah data fasilitas baru
        return view('admin.villaresort.faciliti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'FacilityName' => 'required|string|max:45',
        ]);

        // Menyimpan data fasilitas baru
        VillaresortFacility::create($request->all());
        
        return redirect()->route('admin.villaresort.faciliti.index')->with('success', 'Fasilitas berhasil ditambahkan.');
                         
    }

    /**
     * Display the specified resource.
     */
    public function show(VillaresortFacility $facility)
    {
        // Menampilkan detail data fasilitas
        return view('admin.villaresort.faciliti.show', compact('villaresortFacility'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VillaresortFacility $facility)
    {
        // Menampilkan form untuk mengedit data fasilitas
        return view('admin.villaresort.faciliti.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VillaresortFacility $facility)
    {
        // Validasi data yang diterima
        $request->validate([
            'FacilityName' => 'required|string|max:45',
        ]);

        // Memperbarui data fasilitas
        $facility->update($request->all());

        return redirect()->route('admin.villaresort.faciliti.index')->with('success', 'Fasilitas berhasil diperbarui.');
                         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VillaresortFacility $facility)
    {
        // Menghapus data fasilitas
        $facility->delete();

        return redirect()->route('admin.villaresort.faciliti.index') ->with('success', 'Fasilitas berhasil dihapus.');
                         
    }
}
