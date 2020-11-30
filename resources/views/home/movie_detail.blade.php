@extends('layout.main')

@section('content')
<div class="row" style="padding:4rem 0;">
    <div class="col blog-main movie-detail">
        <div class="row mb-2">
            <div class="col-6 text-center">
                <img class="movie-image" src="{{ $data->image }}"/>
            </div>
            <div class="col-6">
                <h2>{{ $data->name }}</h2>
                <p class="card-movie-rate">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </p>
                <p class="movie-description">
                    {{ $data->description }}
                </p>
                <a href="{{ route('home.video_detail', ['movieSlug' => $data->slug, 'videoNumber' => 1]) }}" class="btn movie-button box-shadow">
                    <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path></svg>
                    <span>Watch Movie</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row border-top" style="padding:4rem 0;">
    <div class="col blog-main">
        <h2 class="text-title text-orange-500">Related movies</h2>
        <div class="row mb-2">
            <?php if (!empty($related)): ?>
            <?php foreach ($related as $v): ?>
            <div class="col-6 col-sm-4 col-md-3">
                @include('layout.movie', ['movie' => $v])
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
@endsection