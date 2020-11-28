<div class="card-movie box-shadow text-center">
    <a href="{{ route('home.movie_detail', ['slug' => $movie->slug]) }}">
        <div class="card-movie-image">
            <img src="{{ $movie->image }}"/>
        </div>
        <p class="card-movie-title">
            {{ $movie->name }}
        </p>
        <p class="card-movie-rate">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
        </p>
        <!--<p>Nov 13, 2020</p>-->
    </a>
</div>