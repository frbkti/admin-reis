<?php

namespace App\Http\Controllers;

use App\Models\HotelInformasi;
use Illuminate\Http\Request;

class HotelInformasiController extends Controller
{
    // Menampilkan semua data hotel
    public function index()
    {
        $hotels = HotelInformasi::all();
        return view('admin.hotels.informasi.index', compact('hotels'));
    }

    // Menampilkan form untuk membuat data hotel baru
    public function create()
    {
        return view('admin.hotels.informasi.create');
    }

    // Menyimpan data hotel baru ke database
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'hotelName' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'description' => 'required',
        'startingPrice' => 'required|numeric',
        'price' => 'required|numeric',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        'checkInTime' => 'required|string',
        'checkOutTime' => 'required|string',
    ]);

    // Mengupload gambar
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = time() . '.' . $file->getClientOriginalExtension(); // Membuat nama unik untuk file
        $file->move(public_path('images'), $filename); // Memindahkan file ke folder public/images
        $validatedData['gambar'] = 'images/' . $filename; // Menyimpan path gambar
    }

    HotelInformasi::create($validatedData);

    return redirect()->route('admin.hotels.informasi.index')->with('success', ' informasi berhasil ditambahkan.');
}

    // Menampilkan detail satu hotel
    public function show(HotelInformasi $hotelInformasi)
    {
        return view('hotel.service', compact('hotelInformasi'));
    }

    // Menampilkan form untuk mengedit data hotel
    public function edit(HotelInformasi $hotelInformasi)
    {
        return view('admin.hotels.informasi.edit', compact('hotelInformasi'));
    }

    // Mengupdate data hotel di database
    public function update(Request $request, HotelInformasi $hotelInformasi)
    {
        $validatedData = $request->validate([
            'hotelName' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'startingPrice' => 'required|numeric',
            'price' => 'required|numeric',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'checkInTime' => 'required|string',
            'checkOutTime' => 'required|string',
        ]);
    
        // Mengupload gambar
        // if ($request->hasFile('gambar')) {
        //     $file = $request->file('gambar');
        //     $filename = time() . '.' . $file->getClientOriginalExtension(); // Membuat nama unik untuk file
        //     $file->move(public_path('images'), $filename); // Memindahkan file ke folder public/images
        //     $validatedData['gambar'] = 'images/' . $filename; // Menyimpan path gambar
           
            $hotelInformasi->update($validatedData);

            return redirect()->route('admin.hotels.informasi.index')->with('success', 'informasi berhasil di Update');
        
    }

    // Menghapus data hotel dari database
    public function destroy(HotelInformasi $hotelInformasi)
    {
        $hotelInformasi->delete();

        return redirect()->route('admin.hotels.informasi.index')->with('success', ' informasi berhasil dihapus.');
    }
}
