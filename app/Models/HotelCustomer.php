<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelCustomer extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'contactNumber',
        'email',
        'identityType',
        'identityNumber',
    ];

    public function order()
    {
        return $this->belongsTo(HotelOrder::class, 'order_id');
    }
}
