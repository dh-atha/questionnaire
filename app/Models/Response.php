<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'questionnaire_id', 'response'];

    public function question()
    {
        return $this->belongsTo(Questionnaire::class, 'id');
    }
}
