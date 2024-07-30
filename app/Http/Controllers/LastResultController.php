<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\Auth;

class LastResultController extends Controller
{
    public function show()
    {
        $userId = Auth::id();

        // Fetch the most recent result for the user
        $responses = Response::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        if ($responses->isEmpty()) {
            return view('sistem_pakar.last_result_empty');
        }

        // Assuming you have a method to calculate scores and determine the major
        $scores = $this->calculateScores($responses);
        $recommended_majors = $this->determineMajor($scores);

        return view('sistem_pakar.last_result', compact('scores', 'recommended_majors'));
    }

    private function calculateScores($responses)
    {
        // Initialize scores
        $scores = [
            'informatika' => 0,
            'sistem_informasi' => 0,
            'teknologi_informasi' => 0,
        ];

        // Calculate scores based on responses
        foreach ($responses as $response) {
            $question = $response->question;

            if ($question) {
                $major = $question->major; // Ensure this field exists in the questionnaires table
                $score = $this->getScoreFromResponse($response->response);

                if (array_key_exists($major, $scores)) {
                    $scores[$major] += $score;
                } else {
                    \Log::warning('Invalid major for response ID: ' . $response->id);
                }
            } else {
                \Log::warning('No associated questionnaire for response ID: ' . $response->id);
            }
        }

        return $scores;
    }

    private function getScoreFromResponse($response)
    {
        switch ($response) {
            case 'tidak suka':
                return 0;
            case 'biasa saja':
                return 1;
            case 'tertarik':
                return 2;
            default:
                return 0;
        }
    }

    private function determineMajor($scores)
    {
        // Define a mapping of major keys to their display names
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
}
