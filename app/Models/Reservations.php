<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo class


class Reservations extends Model
{

    protected $fillable = [
        'price',
        'check_in',
        'check_out',
        'details'
        // other fillable columns
    ];

    protected $attributes = [
        'price' => 0.0, // Set the default value for the "price" column
    ];
    use HasFactory;

    
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }
}
