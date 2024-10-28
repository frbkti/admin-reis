<?php

namespace App\Http\Controllers;

use App\Models\HotelPolicy;
use Illuminate\Http\Request;

class HotelPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data kebijakan hotel
        $hotelPolicies = HotelPolicy::all();
        return view('admin.hotels.Policy.index', compact('hotelPolicies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hotels.Policy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Lakukan validasi terlebih dahulu
        $validatedData = $request->validate([
            'policyname' => 'required|string|max:45',
            'description' => 'required|string',
            'checkinprocedure' => 'required|string|max:45',  // Sesuaikan dengan kolom di database
            'checkoutprocedure' => 'required|string|max:45',  // Pastikan sesuai dengan kolom di database
        ]);

        // Simpan data yang sudah tervalidasi
        HotelPolicy::create($validatedData);

        return redirect()->route('admin.hotels.policy.index')->with('success', 'Policy created successfully.');
    }
      
    

    /**
     * Display the specified resource.
     */
    public function show(HotelPolicy $hotelPolicy)
    {
        // Menampilkan detail kebijakan hotel tertentu
        return view('aadmin.hotels.Policy.show', compact('hotelPolicy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelPolicy $policy)
    {
        return view('admin.hotels.policy.edit', compact('policy'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelPolicy $policy)
    {
        // Validasi input dari request
        $validatedData = $request->validate([
            'policyname' => 'required|string|max:45',
            'description' => 'required|string',
            'checkinprocedure' => 'required|string|max:45',
            'checkoutprocedure' => 'required|string|max:45',
        ]);

        // Update data policy berdasarkan input
        $policy->update($validatedData);

        // Redirect setelah sukses
        return redirect()->route('admin.hotels.policy.index')->with('success', 'Kebijakan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelPolicy $policy)
    {
        $policy->delete();
    
        return redirect()->route('admin.hotels.policy.index')->with('success', 'policy berhasil dihapus.');
    }
    
    
}
