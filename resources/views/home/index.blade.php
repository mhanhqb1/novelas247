@extends('layout.main')

@section('content')
<div class="row" style="padding-top:4rem;">
    <div class="col blog-main">
        <h2 class="text-title text-orange-500">Popular Movies</h2>
        <div class="row mb-2">
            <?php if (!empty($hot_movies)): ?>
            <?php foreach ($hot_movies as $v): ?>
            <div class="col-6 col-sm-4 col-md-3">
                @include('layout.movie', ['movie' => $v])
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
@endsection