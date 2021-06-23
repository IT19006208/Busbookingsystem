<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bus_routes extends Model
{
    //use HasFactory;
    protected $table = 'bus_routes';
    protected $fillable =[
        'bus_id',
        'route_id',
        'status',
        
    ];
}
