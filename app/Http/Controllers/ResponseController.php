<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\Log;

class ResponseController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $userId = Auth::id(); // Get the authenticated user ID
        $responses = $request->input('responses');

        foreach ($responses as $questionId => $responseValue) {
            // Check if a response already exists for this question and user
            $response = Response::where('questionnaire_id', $questionId)
                                ->where('user_id', $userId)
                                ->first();

            if ($response) {
                // Update existing response
                $response->response = $responseValue;
                $response->save();
            } else {
                // Create new response
                Response::create([
                    'user_id' => $userId,
                    'questionnaire_id' => $questionId,
                    'response' => $responseValue,
                ]);
            }
        }

        // Skor awal untuk masing-masing jurusan
        $scores = [
            'informatika' => 0,
            'sistem_informasi' => 0,
            'teknologi_informasi' => 0
        ];

        // Ambil semua pertanyaan dengan major yang terkait
        $questions = Questionnaire::all()->pluck('major', 'id')->toArray();

        $responses = $data['responses'];
        
        // Penilaian berdasarkan jawaban
        foreach ($responses as $questionnaire_id => $response) {
            if (isset($questions[$questionnaire_id])) {
                $major = $questions[$questionnaire_id];
                // Skor berdasarkan jawaban
                $score = $this->getScoreForResponse($response);
                $scores[$major] += $score;
            }
        }

        // Implementasi logika sistem pakar untuk menentukan jurusan di sini
        $recommended_majors = $this->determineMajor($scores);

        return view('sistem_pakar.result', compact('scores', 'recommended_majors'));
    }

    private function determineMajor($scores)
    {
        $majorNames = [
            'informatika' => 'Informatika',
            'sistem_informasi' => 'Sistem Informasi',
            'teknologi_informasi' => 'Teknologi Informasi',
        ];
    
        // Get the maximum score value
        $maxScore = max($scores);
        // Find all majors with the maximum score
        $recommended_majors = array_keys($scores, $maxScore);
    
        // Map the major keys to their display names
        $recommended_majors_display = array_map(function($major) use ($majorNames) {
            return $majorNames[$major] ?? $major;
        }, $recommended_majors);
    
        return $recommended_majors_display;
    }

    private function getScoreForResponse($response)
    {
        // Menentukan skor berdasarkan jawaban
        switch ($response) {
            case 'tidak suka':
                return 0;
            case 'biasa saja':
                return 1;
            case 'tertarik':
                return 2;
            default:
                return 0; // Skor default jika jawaban tidak sesuai
        }
    }
}
