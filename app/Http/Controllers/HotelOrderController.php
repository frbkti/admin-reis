<?php

namespace App\Http\Controllers;

use App\Models\HotelInformasi;
use App\Models\HotelOrder;
use App\Models\HotelRoom;
use Illuminate\Http\Request;

class HotelOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = HotelOrder::with(['hotel', 'room'])->get();
        return view('admin.hotels.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = HotelInformasi::all();
        $rooms = HotelRoom::all();
        return view('admin.hotels.order.create', compact('hotels', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'hotel_id' => 'required|exists:hotel_informasis,id',
            'room_id' => 'required|exists:hotel_rooms,id',
            'discount' => 'nullable|numeric|min:0|max:100', // Validasi diskon dalam persen
            'fullname' => 'required|string|max:100',
            'contactnumber' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'note' => 'nullable|string|max:100',
            'checkInDate' => 'required|date',
            'checkOutDate' => 'required|date|after:checkInDate',
        ]);
    
        // Ambil informasi room untuk mendapatkan room_price
        $room = HotelRoom::findOrFail($validatedData['room_id']);
        $roomPrice = $room->price; // Ambil harga dari room
    
        // Menghitung tanggal check-in dan check-out
        $checkInDate = new \Carbon\Carbon($request->checkInDate);
        $checkOutDate = new \Carbon\Carbon($request->checkOutDate);
        
        // Hitung selisih hari
        $daysDiff = $checkOutDate->diffInDays($checkInDate);
        $totalAmount = $daysDiff * $roomPrice; // Hitung total awal
    
        // Hitung diskon
        $discountPercentage = $request->discount ?? 0; // Ambil diskon, default 0 jika tidak ada
        if ($discountPercentage > 0) {
            $totalAmount -= ($totalAmount * ($discountPercentage / 100)); // Kurangi total dengan diskon
        }
        $totalAmount = max(0, $totalAmount); // Pastikan total tidak negatif
    
        // Sertakan totalAmount ke dalam data yang akan disimpan
        $validatedData['room_price'] = $roomPrice; // Tambahkan harga kamar
        $validatedData['totalAmount'] = $totalAmount; // Tambahkan totalAmount yang telah dihitung
    
        // Debugging: Lihat nilai yang akan disimpan
    
        // Simpan data order ke database
        HotelOrder::create($validatedData);
    
        return redirect()->route('admin.hotels.order.index')->with('success', 'Order berhasil ditambahkan.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = HotelOrder::with(['hotel', 'room'])->findOrFail($id);
        return view('admin.hotels.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelOrder $order)
    {
        // Validasi input
        // $validatedData = $request->validate([
        //     'hotel_id' => 'required|exists:hotel_informasis,id',
        //     'room_id' => 'required|exists:hotel_rooms,id',
        //     'discount' => 'nullable|string|max:100',
        //     'fullname' => 'required|string|max:100',
        //     'contactnumber' => 'required|string|max:100',
        //     'email' => 'required|email|max:100',
        //     'note' => 'nullable|string|max:100',
        //     'checkInDate' => 'required|date',
        //     'checkOutDate' => 'required|date|after:checkInDate',
        // ]);

        // // Ambil informasi room untuk mendapatkan room_price
        // $room = HotelRoom::findOrFail($validatedData['room_id']);
        // $validatedData['room_price'] = $room->price; // Ambil harga dari room

        // // Cek apakah ada gambar yang diupload
        

        // // Update data order di database
        // $order->update($validatedData);

        // return redirect()->route('admin.hotels.order.index')->with('success', 'Order berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = HotelOrder::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.hotels.order.index')->with('success', 'Order berhasil dihapus.');
    }
}
