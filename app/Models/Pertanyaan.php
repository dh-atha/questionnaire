<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    public function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }
}