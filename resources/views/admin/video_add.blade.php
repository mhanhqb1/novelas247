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
                <p>
                    <strong>{{ $sourceId['dailymotion'].$linkPrefix }}</strong>xxx, vi du: {{ $sourceId['dailymotion'].$linkPrefix }}x7wz4qt <br/>
                    <strong>{{ $sourceId['youtube'].$linkPrefix }}</strong>xxx, vi du: {{ $sourceId['youtube'].$linkPrefix }}I_ue3KU-TeQ<br/>
                    <strong>{{ $sourceId['gg_driver'].$linkPrefix }}</strong>xxx, vi du: {{ $sourceId['gg_driver'].$linkPrefix }}1WPOC6n3m6nnBp4L1sXNuWZN4bcEQ4kGO
                </p>
                <textarea rows="15" class="form-control" name="content"><?php if (!empty($data)): echo $data->content; endif; ?></textarea>
            </div>
            <div class="form-group">
                <label for="status">Hien thi</label>
                <select class="form-control" name="status">
                    <option {{ isset($data->status) && $data->status == 1 ? "selected='selected'" : '' }} value="1">Co</option>
                    <option {{ isset($data->status) && $data->status == 0 ? "selected='selected'" : '' }} value="0">Khong</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

</div><!-- /.row -->
@endsection