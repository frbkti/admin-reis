<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPolicy extends Model
{
    use HasFactory;
    protected $fillable = [
       'policyname',
        'description',
        'checkinprocedure',  
        'checkoutprocedure',
    ];
}
