<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bus extends Model
{
    //use HasFactory;
    protected $table = 'bus';
    protected $fillable =[
        'name',
        'type',
        'vehical_number',
    ];
}
