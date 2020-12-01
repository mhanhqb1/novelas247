@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Add video
        </h3>
        <form action="{{ route('admin.video_save') }}" method="POST" class="margin-bot-20">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="movie_id" value="{{ $movieId }}" />
            <?php if (!empty($data)): ?>
            <input type="hidden" name="id" value="{{ $data->id }}" />
            <?php endif; ?>
            <div class="form-group">
                <label for="number">Tap</label>
                <input type="number" class="form-control" name="number" placeholder="" value="{{ !empty($data) ? $data->number : '' }}"/>
            </div>
            <div class="form-group">
                <label for="content">Link videos</label>
                <textarea rows="15" class="form-control" name="content"><?php if (!empty($data)): echo $data->content; endif; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

</div><!-- /.row -->
@endsection