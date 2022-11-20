@extends('admin.layout.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users Data</h1>
    <a href="user/create" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><span class="fas fa-fw fa-plus fa-sm text-white-50"></span> Add User</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>User Name</th>
                        <th>Email</th>                        
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                </tfoot>
                <tbody>                    
                    @foreach ($user_data as $us)
                    <tr>
                        <td align="center">{{ $loop->iteration }}</td>
                        <td>{{ $us->name }}</td>
                        <td>{{ $us->email }}</td>                        
                        <td align="center">{{ $us->created_at }}</td>
                        <td align="center">{{ $us->updated_at }}</td>
                        <td align="center">
                            <a href="user/{{ $us->id }}/edit" class="btn btn-sm btn-warning d-inline"><span class="fas fa-fw fa-edit"></span></a>
                            
                            <form action="{{ route('user.destroy', $us->id) }}" method="POST" class="d-inline p-2">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-sm btn-danger"><span class="fas fa-fw fa-trash"></span></button>
                            </form>                            
                        </td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection