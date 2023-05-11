<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    protected $fillable = ['name',
        'temp_min',
        'temp_max',
        'conduta_ar'];

    public function leitura()
    {
        return $this->hasOne(Leitura::class);
    }

    public function config()
    {
        return $this->hasOne(Config::class);
    }
}
