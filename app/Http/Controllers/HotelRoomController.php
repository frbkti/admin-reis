<?php

namespace App\Http\Controllers;

use App\Models\HotelInformasi;
use App\Models\HotelRoom;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = HotelRoom::with('hotel')->get();
        return view('admin.hotels.rooms.index', compact('rooms'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = HotelInformasi::all();
        return view('admin.hotels.rooms.create', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hotel_id' => 'required|exists:hotel_informasis,id',                
            'roomTypeName' => 'required|max:45',
            'price' => 'required|numeric',
            'capacity' => 'required|max:45',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'description' => 'required|max:255',
        ]);
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Membuat nama unik untuk file
            $file->move(public_path('images'), $filename); // Memindahkan file ke folder public/images
            $validatedData['gambar'] = 'images/' . $filename; // Menyimpan path gambar
        }
    
        HotelRoom::create($validatedData);
    

        return redirect()->route('admin.hotels.rooms.index')->with('success', ' created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(HotelRoom $room)
    {
        return view('admin.hotels.rooms.show', compact('room'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelRoom $room)
    {
        $hotels = HotelInformasi::all();
        return view('admin.hotels.rooms.edit', compact('room', 'hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelRoom $room)
    {
        $validatedData = $request->validate([
            'price' => 'required|numeric',
            'capacity' => 'required|max:45',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'description' => 'required|max:45',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Membuat nama unik untuk file
            $file->move(public_path('images'), $filename); // Memindahkan file ke folder public/images
            $validatedData['gambar'] = 'images/' . $filename; // Menyimpan path gambar
        }

        $room->update($validatedData);

        return redirect()->route('admin.hotels.rooms.index')->with('success', '  Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelRoom $room)
{
    $room->delete();

    return redirect()->route('admin.hotels.rooms.index')->with('success', 'Room berhasil dihapus.');
}

}
