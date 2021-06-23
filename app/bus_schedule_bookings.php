<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bus_schedule_bookings extends Model
{
    //use HasFactory;
    protected $table = 'bus_schedule_bookings';
    protected $fillable =[
        'bus_seate_id',
        'user_id',
        'bus_schedule_id',
        'seat_number',
        'price',
        'status',
        
    ];
}
