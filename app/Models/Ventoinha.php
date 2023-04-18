<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventoinha extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'velocidade',
        'mode'

    ];
}
