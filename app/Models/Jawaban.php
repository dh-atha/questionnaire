<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
