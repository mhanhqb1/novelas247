@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Add movie
        </h3>
        <form action="{{ route('admin.movie_save') }}" method="POST" class="margin-bot-20">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <label for="name">Ten</label>
                <input type="text" class="form-control" name="name" placeholder="Name"/>
            </div>
            <div class="form-group">
                <label for="image">Hinh anh</label>
                <input type="text" class="form-control" name="image" placeholder="Image"/>
            </div>
            <div class="form-group">
                <label for="country_id">Quoc gia</label>
                <select class="form-control" name="country_id">
                    <?php foreach ($countries as $c): ?>
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Mo ta</label>
                <textarea id="editor" rows="20" class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="country_id">Phim hot</label>
                <select class="form-control" name="is_hot">
                    <option value="1">Co</option>
                    <option value="0">Khong</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

</div><!-- /.row -->
@endsection