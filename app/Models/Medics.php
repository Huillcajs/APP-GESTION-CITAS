<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medics extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'specialty',
        'phone',
        'email',
        'license',
        'years_experience',
    ];
    use HasFactory;
}
