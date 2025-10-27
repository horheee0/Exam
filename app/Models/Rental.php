<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'renter_name',
        'rent_date',
        'return_date',
        'machinery_id',
    ];

    
    public function machinery()
    {
        return $this->belongsTo(Machinery::class);
    }
}
