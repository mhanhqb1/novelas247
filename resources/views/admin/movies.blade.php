@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            List movies <a href="{{ route('admin.movie_add') }}" class="btn btn-warning">Add new</a>
        </h3>
        <form action="{{ route('admin.movies') }}" method="GET" class="margin-bot-20">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="limit">Limit</label>
                    <input type="number" class="form-control" name="limit" placeholder="Limit" value="{{ isset($params['limit']) ? $params['limit'] : '' }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <input type="number" class="form-control" name="status" placeholder="Status" value="{{ isset($params['status']) ? $params['status'] : '' }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $v): ?>
                    <tr>
                        <td>
                            {{ $v->id }}
                        </td>
                        <td><label for="checkId-{{ $v->id }}"><img src="{{ $v->image }}" width="200px"/></label></td>
                        <td>{{ $v->name }}</td>
                        <td>
                            <a href="{{ route('admin.movie_detail', ['movieId' => $v->id]) }}" class="btn btn-warning">Detail</a>
                            <a href="{{ route('admin.movie_edit', ['movieId' => $v->id]) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('admin.video_add', ['movieId' => $v->id]) }}" class="btn btn-info">Add Video</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div><!-- /.row -->
@endsection