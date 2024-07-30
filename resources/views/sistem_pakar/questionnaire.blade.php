@extends('layouts.app')

@section('title', 'Questionnaire')

@section('content')
<div class="container">
    <h1 class="mt-4">Questionnaire</h1>
    <form method="POST" action="{{ route('responses.store') }}">
        @csrf
        @foreach($questions as $index => $question)
            <div class="card my-4 question-card" id="question-card-{{ $index }}" style="display: {{ $index === 0 ? 'block' : 'none' }};">
                <div class="card-body">
                    <h5 class="card-title">{{ $question->question }}</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="responses[{{ $question->id }}]" id="response-{{ $question->id }}-1" value="tidak suka" required>
                        <label class="form-check-label" for="response-{{ $question->id }}-1">
                            Tidak Pernah/Tidak Tertarik
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="responses[{{ $question->id }}]" id="response-{{ $question->id }}-2" value="biasa saja">
                        <label class="form-check-label" for="response-{{ $question->id }}-2">
                            Jarang/Biasa saja
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="responses[{{ $question->id }}]" id="response-{{ $question->id }}-3" value="tertarik">
                        <label class="form-check-label" for="response-{{ $question->id }}-3">
                            Sering/Tertarik
                        </label>
                    </div>
                    <div class="mt-3">
                        @if($index > 0)
                            <button type="button" class="btn btn-secondary prev-button" data-prev-index="{{ $index - 1 }}">Previous</button>
                        @endif
                        @if($index < count($questions) - 1)
                            <button type="button" class="btn btn-primary next-button" data-next-index="{{ $index + 1 }}">Next</button>
                        @else
                            <button type="submit" class="btn btn-success">Submit</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nextButtons = document.querySelectorAll('.next-button');
        const prevButtons = document.querySelectorAll('.prev-button');

        nextButtons.forEach(button => {
            button.addEventListener('click', function () {
                const currentIndex = this.parentNode.parentNode.parentNode.id.split('-')[2];
                const radios = document.querySelectorAll(`#question-card-${currentIndex} input[type="radio"]`);
                let selected = false;
                radios.forEach(radio => {
                    if (radio.checked) {
                        selected = true;
                    }
                });

                if (selected) {
                    const nextIndex = this.getAttribute('data-next-index');
                    showQuestionCard(nextIndex);
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Please select an option before proceeding.',
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                        },
                        willClose: () => {
                            Swal.hideLoading()
                        }
                    }).then(() => {
                        // Re-enable the buttons after alert closes
                        nextButtons.forEach(button => button.disabled = false);
                        prevButtons.forEach(button => button.disabled = false);
                    });
                }
            });
        });

        prevButtons.forEach(button => {
            button.addEventListener('click', function () {
                const prevIndex = this.getAttribute('data-prev-index');
                showQuestionCard(prevIndex);
            });
        });

        function showQuestionCard(index) {
            const cards = document.querySelectorAll('.question-card');
            cards.forEach(card => card.style.display = 'none');
            document.getElementById('question-card-' + index).style.display = 'block';
        }
    });
</script>
@endsection
