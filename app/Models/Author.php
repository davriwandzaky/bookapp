<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    protected $fillable = ['name', 'gender', 'biography']; 
}