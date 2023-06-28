@extends('admin.layout.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hospital Patient</h1>
        <a href="/patient/create" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><span
                class="fas fa-fw fa-plus fa-sm text-white-50"></span> Add Patient</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patient as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->address }}
                                </td>
                                <td>
                                    {{ $item->phone_number }}
                                </td>
                                <td>
                                    {{ $item->status }}
                                </td>
                                </td>
                                <td align="center">
                                    <div class="d-flex justify-content-between" style="width:80px">
                                        <a href="/patient/edit/{{ $item->id }}" class="btn btn-sm btn-secondary"
                                            title="Edit"><span class="fas fa-fw fa-edit"></span></a>

                                            @if (isset($item->history->id))
                                            <a href="/patient/modify/{{ $item->id }}"
                                                class="btn btn-sm btn-warning" title="Remove"><span
                                                    class="fas fa-fw fa-archive"></span></a>
                                            @else
                                            <a href="/patient/delete/{{ $item->id }}"
                                                onclick="return confirm('Apakah anda yakin mau menghapus pasien ini ?');"
                                                class="btn btn-sm btn-danger" title="Remove"><span
                                                    class="fas fa-fw fa-trash"></span></a>
                                            @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
