@extends('home.pages.layouts.master')

@section('content')
    <div class="container bg-light pt-5 pb-5 px-3 rounded">
        <h2>سوالات متداول</h2>
        <hr>
        <!-- questions -->
        <div class="accordion" id="questions">
            @foreach( $questions as $question)
                <div class="card">
                    <div class="card-header" id="{{ $question->id }}">
                        <h5 class="mb-0">
                            <span> - </span>
                            <a class="cursor-pointer collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $question->id }}" aria-expanded="false" aria-controls="collapse{{ $question->id }}">
                                <span>{{ $question->question }}</span>
                            </a>
                        </h5>
                    </div>
                    <div id="collapse{{ $question->id }}" class="collapse" aria-labelledby="{{ $question->id }}" data-parent="#questions">
                        <div class="card-body text text-justify">
                            {!! $question->answer !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- questions -->
    </div>
@endsection