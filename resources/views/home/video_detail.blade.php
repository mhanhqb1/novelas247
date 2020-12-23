<?php
$sourceUrls = [];
$urls = explode(PHP_EOL, $data['content']);
if (!empty($urls)) {
    foreach ($urls as $u) {
        $tmp = explode($linkPrefix, $u);
        $sourceUrls[] = [
            'name' => $tmp[0],
            'source' => $tmp[1]
        ];
    }
}
$server = !empty($_GET['server']) ? $_GET['server'] : 1;
$sourceName = $sourceUrls[$server-1]['name'];
$sourceVideo = $sourceUrls[$server-1]['source'];
$sourceLayout = '';
if ($sourceName == $sourceId['dailymotion']) {
    $sourceLayout = 'layout.video.dailymotion';
} else if ($sourceName == $sourceId['youtube']) {
    $sourceLayout = 'layout.video.youtube';
} else if ($sourceName == $sourceId['gg_driver']) {
    $sourceLayout = 'layout.video.gg_driver';
} else if ($sourceName == $sourceId['ok_ru']) {
    $sourceLayout = 'layout.video.ok_ru';
}
?>

@extends('layout.main')

@section('content')
<div class="row" style="padding:4rem 0;">
    <div class="col blog-main movie-detail">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-orange-500">{{ $pageTitle }}</h1>
            </div>
            
            <div class="col-12">
                @include($sourceLayout, ['id' => $sourceVideo])
            </div>
            
            <ul class="col-12 list-videos list-servers">
                <?php foreach ($sourceUrls as $k => $s): ?>
                <li>
                    <a class="{{ $k + 1 == $server ? 'active' : '' }}" href="{{ route('home.video_detail', ['movieSlug' => $data['movie_slug'], 'videoNumber' => $videoNumber, 'server' => ($k + 1)]) }}">{{ 'Opción '.($k + 1) }}</a>
                </li>
                <?php endforeach; ?>
            </ul>
            
            <?php if (!empty($listVideos)): ?>
            <h2>CAPITULOS</h2>
            <ul class="col-12 list-videos">
                <?php foreach ($listVideos as $v): ?>
                <li>
                    <a class="{{ $v['number'] == $videoNumber ? 'active' : '' }}" href="{{ route('home.video_detail', ['movieSlug' => $data['movie_slug'], 'videoNumber' => $v['number']]) }}">{{ $v['name'] }}</a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            
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
                    <?php echo $data->description ; ?>
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