<?php

namespace App\Http\Controllers;

use App\Models\VillaresortInformasi;
use Illuminate\Http\Request;

class VillaresortInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasis = VillaresortInformasi::all();
        return view('admin.villaresort.informasi.index', compact('informasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.villaresort.informasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'villaresortname' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'startingPrice' => 'required|numeric',
            'price' => 'required|numeric',
            'gambar' => 'required|image',
            'checkInTime' => 'required|string',
            'checkOutTime' => 'required|string',
        ]);
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('images'), $filename); 
            $validatedData['gambar'] = 'images/' . $filename; 
        }
    
        VillaresortInformasi::create($validatedData);
    
        return redirect()->route('admin.villaresort.informasi.index')->with('success', ' informasi berhasil ditambahkan.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $informasi = VillaResortInformasi::findOrFail($id);
        return view('villaresort_informasis.edit', compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VillaresortInformasi $informasi)
    {
        $validatedData = $request->validate([
            'villaresortname' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'startingPrice' => 'required|numeric',
            'price' => 'required|numeric',
            'gambar' => 'required|image',
            'checkInTime' => 'required|string',
            'checkOutTime' => 'required|string',
        ]);
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('images'), $filename); 
            $validatedData['gambar'] = 'images/' . $filename; 
        }
    
        $informasi->update($validatedData);

        return redirect()->route('admin.villaresort.informasi.index')->with('success', ' informasi berhasil ditambahkan.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VillaresortInformasi $informasi)
    {
        $informasi->delete();

        return redirect()->route('admin.villaresort.informasi.index')->with('success', ' informasi berhasil dihapus.');
    }
}
