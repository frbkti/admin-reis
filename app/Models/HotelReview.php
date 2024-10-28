<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
         'reviewerName',
        'reviewDate',
        'rating',
        'reviewText'
    ];

    public function hotel()
    {
        return $this->belongsTo(HotelInformasi::class, 'hotel_id');
    }
}
