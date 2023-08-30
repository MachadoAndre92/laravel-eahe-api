<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = [
        'zona_id',
        'threshold_min',
        'threshold_max',
        'trigger',
        'temp'

    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
}
