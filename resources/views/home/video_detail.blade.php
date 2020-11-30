@extends('layout.main')

@section('content')
<div class="row" style="padding:4rem 0;">
    <div class="col blog-main movie-detail">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-orange-500">{{ $pageTitle }}</h1>
            </div>
            
            <?php if (!empty($listVideos)): ?>
            <ul class="col-12 list-videos">
                <?php foreach ($listVideos as $v): ?>
                <li>
                    <a class="{{ $v['number'] == $videoNumber ? 'active' : '' }}" href="{{ route('home.video_detail', ['movieSlug' => $data['movie_slug'], 'videoNumber' => $v['number']]) }}">{{ $v['number'] }}</a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            
            <div class="col-12">
                <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;"> 
                    <iframe style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden" frameborder="0" type="text/html" src="https://www.dailymotion.com/embed/video/x7xql2o?autoplay=1&mute=0" width="100%" height="100%" allowfullscreen allow="autoplay"> </iframe> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row border-top" style="padding:4rem 0;">
    <div class="col blog-main movie-detail">
        <div class="row mb-2">
            <div class="col-6 text-center">
                <img class="movie-image" src="{{ $data->image }}"/>
            </div>
            <div class="col-6">
                <h2>{{ $data->movie_name }}</h2>
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