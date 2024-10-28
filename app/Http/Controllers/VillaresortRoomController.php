<?php

namespace App\Http\Controllers;
use App\Models\VillaResortInformasi;
use App\Models\VillaresortRoom;
use Illuminate\Http\Request;

class VillaResortRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = VillaresortRoom::with('villaresort')->get();
        return view('admin.villaresort.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villaResorts = VillaresortInformasi::all();
        return view('admin.villaresort.rooms.create', compact('villaResorts'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'villaresort_id' => 'required|exists:villaresort_informasis,id',
            'roomTypeName' => 'required|max:45',
            'price' => 'required|numeric',
            'capacity' => 'required|max:45',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'description' => 'required|max:255',
        ]);

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Membuat nama unik untuk file
            $file->move(public_path('images'), $filename); // Memindahkan file ke folder public/images
            $validatedData['gambar'] = 'images/' . $filename; // Menyimpan path gambar
        }

        // Simpan data ke database
        VillaresortRoom::create($validatedData);

        return redirect()->route('admin.villaresort.rooms.index')->with('success', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VillaresortRoom $villaresortRoom)
    {
        return view('admin.villaresort.rooms.show', compact('villaresortRoom'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VillaresortRoom $villaresortRoom)
    {
        $villaResorts = VillaResortInformasi::all();
        return view('admin.villaresort.rooms.edit', compact('villaresortRoom', 'villaResorts'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VillaresortRoom $villaresortRoom)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'villaresort_id' => 'required|exists:villaresort_informasis,id',
            'roomTypeName' => 'required|max:45',
            'price' => 'required|numeric',
            'capacity' => 'required|max:45',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'description' => 'required|max:255',
        ]);

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Membuat nama unik untuk file
            $file->move(public_path('images'), $filename); // Memindahkan file ke folder public/images
            $validatedData['gambar'] = 'images/' . $filename; // Menyimpan path gambar
        }

        // Update data di database
        $villaresortRoom->update($validatedData);

        return redirect()->route('admin.villaresort.rooms.index')->with('success', 'Room updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VillaresortRoom $villaresortRoom)
    {
        // Hapus data dari database
        $villaresortRoom->delete();

        return redirect()->route('admin.villaresort.rooms.index')->with('success', 'Room deleted successfully.');
    }
}