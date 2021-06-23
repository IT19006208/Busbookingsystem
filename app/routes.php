<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class routes extends Model
{
    //use HasFactory;
    protected $table = 'routes';
    protected $fillable =[
        'node_one',
        'node_two',
        'route_number',
        'distance',
        'time',
    ];
}
