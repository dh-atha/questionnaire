<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questions = Questionnaire::all();
        return view('sistem_pakar.questionnaire', compact('questions'));
    }
}