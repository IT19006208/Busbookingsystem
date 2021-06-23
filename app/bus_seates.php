<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bus_seates extends Model
{
    //use HasFactory;
    protected $table = 'bus_seates';
    protected $fillable =[
        'bus_id',
        'seat_number',
        'price',
    ];
}
