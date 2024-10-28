<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelInformasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotelName',
        'location',
        'description',
        'startingPrice',
        'price',
        'gambar',
        'checkInTime',
        'checkOutTime'
    ];
    public function rooms()
    {
        return $this->hasMany(HotelRoom::class, 'hotel_id');
    }

    public function reviews()
    {
        return $this->hasMany(HotelReview::class, 'hotel_id');
    }
    public function orders()
    {
        return $this->hasMany(HotelReview::class, 'hotel_id');
    }
}
