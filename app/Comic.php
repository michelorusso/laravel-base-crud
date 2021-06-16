<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    // colonne del database
    protected $fillable = [
        'title',
        'description',
        'poster',
        'price',
        'start_date'
    ];
}
