@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Hello, {{ $user->name }}!</h5>
            <p class="card-text">What do you want to do today?</p>
        </div>
    </div>
    
    <div class="row">
        <!-- Card for Questionnaire -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Take the Questionnaire</h5>
                    <p class="card-text">Complete the questionnaire to get personalized recommendations.</p>
                    <a href="{{ route('questionnaire.index') }}" class="btn btn-primary">Start Questionnaire</a>
                </div>
            </div>
        </div>

        <!-- Card for Latest Results -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">View Latest Results</h5>
                    <p class="card-text">Check your most recent results and recommendations.</p>
                    <a href="{{ route('results.last') }}" class="btn btn-secondary">View Results</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
