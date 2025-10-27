<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machinery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'rate_per_day',
        'status',
    ];

    
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
