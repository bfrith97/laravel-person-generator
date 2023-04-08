<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedPerson extends Model
{
    use HasFactory;

    // Define the attributes that the table has.
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'age',
        'image_url',
    ];
}
