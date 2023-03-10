@extends('admin.layout.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hospital Employee</h1>
        <a href="/employee/create" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><span
                class="fas fa-fw fa-plus fa-sm text-white-50"></span> Add Employee</a>
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
                            <th>Role</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee as $item)
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
                                    {{ $item->roles->role_name }}
                                </td>
                                <td>
                                    {{ $item->phone_number }}
                                </td>
                                <td>
                                    {{ $item->user->status }}
                                </td>
                                </td>
                                <td align="center">
                                    <div class="d-flex justify-content-between" style="width:80px">
                                        <a href="/employee/edit/{{ $item->user->id }}" class="btn btn-sm btn-warning"
                                            title="Edit"><span class="fas fa-fw fa-edit"></span></a>
                                            @if (isset($item->history->id))
                                            <a href="/employee/modify/{{ $item->user->id }}"
                                                onclick="return confirm('Are you sure you want to deactivate this battery?');"
                                                class="btn btn-sm btn-danger" title="Remove"><span
                                                    class="fas fa-fw fa-trash"></span></a>
                                            @else
                                            <a href="/employee/delete/{{ $item->user->id }}"
                                                onclick="return confirm('Are you sure you want to deactivate this battery?');"
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
    {{-- END OF MODAL TAMBAH --}}
@endsection
