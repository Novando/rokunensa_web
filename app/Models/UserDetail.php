<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'address_line_1',
        'address_line_2',
        'city',
        'country',
        'zip',
        'phone',
        'avatar'
    ];
}
