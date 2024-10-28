<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'roomTypeName',
        'price',
        'capacity',
        'gambar',
        'description',
    ];
    public function hotel()
    {
        return $this->belongsTo(HotelInformasi::class, 'hotel_id');
    }
}
