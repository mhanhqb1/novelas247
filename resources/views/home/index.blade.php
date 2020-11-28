@extends('layout.main')

@section('content')
<div class="row" style="padding-top:4rem;">
    <div class="col blog-main">
        <h2 class="text-title text-orange-500">Popular Movies</h2>
        <div class="row mb-2">
            <?php for ($i = 1; $i <= 16; $i++): ?>
            <div class="col-6 col-sm-4 col-md-3">
                <div class="card-movie box-shadow text-center">
                    <a href="">
                        <div class="card-movie-image">
                            <img src="https://image.tmdb.org/t/p/w500//4ZocdxnOO6q2UbdKye2wgofLFhB.jpg"/>
                        </div>
                        <p class="card-movie-title">
                            Chick Fight {{ $i }}
                        </p>
                        <p class="card-movie-rate">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </p>
                        <p>Nov 13, 2020</p>
                    </a>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        <div class="row">
            <div class="col home-btn">
                <a href="#" class="btn btn-outline-primary">View more</a>
            </div>
        </div>
    </div>
</div>
@endsection