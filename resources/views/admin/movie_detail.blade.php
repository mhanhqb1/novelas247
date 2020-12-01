@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Movie detail 
            <a href="{{ route('admin.video_add', ['movieId' => $data->id]) }}" class="btn btn-warning">Add video</a>
            <a href="{{ route('admin.movie_edit', ['movieId' => $data->id]) }}" class="btn btn-primary">Edit</a>
        </h3>
        <table class="table table-bordered">
            <tr>
                <td class="bg-gray-900">Ten</td>
                <td>{{ $data->name }}</td>
            </tr>
            <tr>
                <td class="bg-gray-900">Quoc gia</td>
                <td>{{ $country->name }}</td>
            </tr>
            <tr>
                <td class="bg-gray-900">Hinh anh</td>
                <td><img src="{{ $data->image }}" width="300px"/></td>
            </tr>
            <tr>
                <td class="bg-gray-900">Mo ta</td>
                <td><?php echo $data->description; ?></td>
            </tr>
            <tr>
                <td class="bg-gray-900">Phim hot</td>
                <td>{{ !empty($data->is_hot) ? 'Co' : 'Khong' }}</td>
            </tr>
        </table>
    </div>

</div><!-- /.row -->
<div class="row">
    <div class="col blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            List video
        </h3>
        <table class="table table-bordered">
            <tr>
                <td class="bg-gray-900">Ten</td>
                <td class="bg-gray-900">Link</td>
                <td class="bg-gray-900"></td>
            </tr>
            <?php foreach ($videos as $v): ?>
            <tr>
                <td>{{ $v->name }}</td>
                <td>{{ $v->content }}</td>
                <td><a href="" class="btn btn-primary">Edit</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div><!-- /.row -->
@endsection