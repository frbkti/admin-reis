<?php

namespace App\Http\Controllers;
use App\Models\HotelInformasi; 
use Illuminate\Http\Request;

class HotelServiceController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel hotel_informasis
        $hotelInformasis = HotelInformasi::all();

        // Mengirim data ke view hotelservice.blade.php
        return view('hotel.service', compact('hotelInformasis'));
    }

    public function show($id)
    {
        // Mengambil data hotel berdasarkan ID
        $hotel = HotelInformasi::find($id);
    
        // Cek jika data hotel ditemukan
        if (!$hotel) {
            return redirect()->route('hotel.service')->with('error', 'Hotel tidak ditemukan');
        }
    
        // Mengirim data ke view hotel.service
        return view('hotel.service', compact('hotel'));
    }
    
    
    

}