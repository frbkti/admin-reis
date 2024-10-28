<?php

namespace App\Http\Controllers;

use App\Models\HotelCustomer;
use App\Models\HotelOrder;
use Illuminate\Http\Request;

class HotelCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = HotelCustomer::with('order')->get();
        return view('admin.hotels.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = HotelOrder::all(); 
        return view('admin.hotels.customer.create', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:hotel_orders,id',
            'contactNumber' => 'required|string|max:25',
            'email' => 'required|string|max:100',
            'identityType' => 'required|in:KTP,SIM,Passport',
            'identityNumber' => 'required|string|max:50|unique:hotel_customers,identityNumber',
        ]);

        HotelCustomer::create($validatedData);

        return redirect()->route('admin.hotels.customer.index')->with('success', 'Customer berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = HotelCustomer::findOrFail($id);
        $orders = HotelOrder::all();
        return view('admin.hotels.customer.edit', compact('customer', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'identityType' => 'required|in:KTP,SIM,Passport',
            'identityNumber' => 'required|string|max:50|unique:hotel_customers,identityNumber,'.$id,
        ]);

        $customer = HotelCustomer::findOrFail($id);
        $customer->update($validatedData);

        return redirect()->route('admin.hotels.customer.index')->with('success', 'Customer berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = HotelCustomer::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.hotels.customer.index')->with('success', 'Customer berhasil dihapus.');
    
    }
}
