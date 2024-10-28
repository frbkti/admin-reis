<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaresortInformasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'villaresortname',
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
}
