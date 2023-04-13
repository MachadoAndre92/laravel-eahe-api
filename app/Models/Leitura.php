<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leitura extends Model
{
    use HasFactory;

    protected $fillable = [
        'zona_id',
        'sensor_id',
        'temp',
        'hum'

    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
