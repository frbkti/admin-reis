<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaresortRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'villaresort_id',
        'roomTypeName',
        'price',
        'capacity',
        'gambar',
        'description',
    ];
    public function villaresort()
    {
        return $this->belongsTo(VillaresortInformasi::class, 'villaresort_id');
    }
}
