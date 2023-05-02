<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = [
        'zona_id',
        'Mode',
        'Threshold_min',
        'Threshold_max',
        'Trigger',
        'Ventoinha',
        'Servo',
        'Velocidade',
        'Temperatura'

    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
}
