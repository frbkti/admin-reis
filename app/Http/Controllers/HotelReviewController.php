<?php

namespace App\Http\Controllers;

use App\Models\HotelInformasi;
use App\Models\HotelReview;
use Illuminate\Http\Request;

class HotelReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua review hotel
        $reviews = HotelReview::all();
        return view('admin.hotels.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambah review baru
        $hotels = HotelInformasi::all();
        return view('admin.hotels.review.create', compact('hotels'));    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'hotel_id' => 'required|exists:hotel_informasis,id',
            'reviewerName' => 'required|string|max:45',
            'reviewDate' => 'required|date',
            'rating' => 'required|integer|min:1|max:5',
            'reviewText' => 'required|string|max:45',
        ]);

        // Menyimpan review baru ke database
        HotelReview::create($request->all());

        return redirect()->route('admin.hotels.review.index')->with('success', 'Review berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menampilkan detail review berdasarkan ID
        $review = HotelReview::findOrFail($id);
        return view('admin.hotels.review.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Menampilkan form untuk mengedit review
        $review = HotelReview::findOrFail($id);
        return view('admin.hotels.review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'reviewerName' => 'required|string|max:45',
            'reviewDate' => 'required|date',
            'rating' => 'required|integer|min:1|max:5',
            'reviewText' => 'required|string|max:45',
        ]);

        // Mengupdate review berdasarkan ID
        $review = HotelReview::findOrFail($id);
        $review->update($request->all());

        return redirect()->route('admin.hotels.review.index')->with('success', 'Review berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menghapus review berdasarkan ID
        $review = HotelReview::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.hotels.review.index')->with('success', 'Review berhasil dihapus.');
    }
}
