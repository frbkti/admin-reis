<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'room_id',
        'room_price',
        'discount',
        'fullname',
        'contactnumber',
        'email',
        'note',
        'checkInDate',
        'checkOutDate',
        'totalAmount', 
    ];
    

    public function hotel()
    {
        return $this->belongsTo(HotelInformasi::class, 'hotel_id');
    }

    public function room()
    {
        return $this->belongsTo(HotelRoom::class, 'room_id');
    }

    protected static function booted()
    {
        static::creating(function ($hotelOrder) {
            $room = HotelRoom::find($hotelOrder->room_id); 
            if ($room) {
                $hotelOrder->room_price = $room->price; 
            }
        });
    }

    public function getRoomPriceAttribute($value)
    {
        if (!$value && $this->room) {
            return $this->room->price; 
        }
        return $value;
    }

    public function customers()
    {
        return $this->hasMany(HotelCustomer::class, 'order_id');
    }

}