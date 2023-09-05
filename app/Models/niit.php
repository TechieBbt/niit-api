<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niit extends Model
{
    use HasFactory;

    protected $table = 'niit';

    protected $fillable = [
        'firstname',
        'lastname',
        'department',
        'course',
        'phone'
    ];
}
