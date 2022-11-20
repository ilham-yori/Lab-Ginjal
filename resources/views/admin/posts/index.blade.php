@extends('admin.layout.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Post</h1>
    </div>
    <!-- End of Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Post Data</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table" style="width : 100%">
                    <thead>
                        <tr style="text-align : center">
                            <th>#</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Thumbnail</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($posts_data as $posts)
                            <tr>
                                <td align="center" style="vertical-align: middle">{{ $loop->iteration }}</td>
                                <td style="vertical-align: middle">{{ $posts->title }}</td>
                                <td align="center" style="vertical-align: middle">
                                    {{ date_create($posts->created_at)->format('d-m-Y H:i:s') }}</td>
                                <td align="center"><img src="{{ url('') }}/storage/{{ $posts->thumbn }}"
                                        style="max-width: 150px" alt=""></td>
                                <td align="center" style="vertical-align: middle">
                                    <div class="d-flex">
                                        <div class="d-flex justify-content-center">
                                            <a href="posts/{{ $posts->slug }}/edit" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="posts/remove/{{ $posts->slug }}"
                                                onclick="return confirm('Hapus artikel ini?')"
                                                class="btn btn-sm btn-danger ml-1"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            {{ $posts_data->links() }}
        </div>
    </div>
@endsection
