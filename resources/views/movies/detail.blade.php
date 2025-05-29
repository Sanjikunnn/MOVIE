@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@700&display=swap" rel="stylesheet">
@endsection
@section('content')
<div class="movie-card mb-3">
    <div class="row no-gutters">
        <div class="col-md-4">
            <div class="poster-container">
                <img src="{{ $movie->getPosterUrl() }}" class="card-img" alt="{{ $movie->title }}">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h2 class="card-title">{{ $movie->title }} ({{ $movie->year }})</h2>
                <p class="card-text"><strong>{{ trans('messages.genre') }}:</strong> <span class="detail-text">{{ $movie->genre }}</span></p>
                <p class="card-text"><strong>{{ trans('messages.director') }}:</strong> <span class="detail-text">{{ $movie->director }}</span></p>
                <p class="card-text"><strong>{{ trans('messages.actors') }}:</strong> <span class="detail-text">{{ $movie->actors }}</span></p>
                <p class="card-text"><strong>{{ trans('messages.plot') }}:</strong> <span class="detail-text">{{ $movie->plot }}</span></p>
                <p class="card-text"><strong>{{ trans('messages.rating') }}:</strong> <span class="detail-text">{{ $movie->imdbRating }} / 10</span></p>
                <p class="card-text"><strong>{{ trans('messages.awards') }}:</strong> <span class="detail-text">{{ $movie->awards }}</span></p>
                <p class="card-text"><strong>{{ trans('messages.box_office') }}:</strong> <span class="detail-text">{{ $movie->boxOffice }}</span></p>

                <div class="d-flex justify-content-start align-items-center mt-4"> {{-- Added a div for button alignment --}}
                    @if ($isFavorite)
                        <form action="{{ route('favorites.destroy', $movie->imdbID) }}" method="POST" class="d-inline mr-2"> {{-- Added mr-2 for spacing --}}
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="cta-button danger-button">{{ trans('messages.remove_favorite') }}</button>
                        </form>
                    @else
                        <form action="{{ route('favorites.store') }}" method="POST" class="d-inline mr-2"> {{-- Added mr-2 for spacing --}}
                            @csrf
                            <input type="hidden" name="imdb_id" value="{{ $movie->imdbID }}">
                            <button type="submit" class="cta-button warning-button">{{ trans('messages.add_favorite') }}</button>
                        </form>
                    @endif
                    <a href="{{ route('movies.list') }}" class="cta-button secondary-button">{{ trans('messages.back_to_list') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection