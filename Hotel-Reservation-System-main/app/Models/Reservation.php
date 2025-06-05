<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'guest_name', 'email', 'check_in', 'check_out', 'room_type', 'guests'
    ];
    use HasFactory;
    
}
