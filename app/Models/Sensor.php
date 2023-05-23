<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function leitura()
    {
        return $this->hasMany(Leitura::class);
    }

    public function leituraHistory()
    {
        return $this->hasMany(LeituraHistory::class);
    }
}

