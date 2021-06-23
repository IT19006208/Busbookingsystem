<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bus_schedules extends Model
{
    //use HasFactory;
    protected $table = 'bus_schedules';
    protected $fillable =[
        'bus_route_id',
        'direction',
        'start_timestamp',
        'end_timestamp',
    ];
}

