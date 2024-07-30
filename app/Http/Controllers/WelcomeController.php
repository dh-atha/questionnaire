<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Fetch any necessary data for the dashboard here
        // For example, fetch user-related stats or recent activity

        return view('welcome.dashboard', compact('user'));
    }
}
