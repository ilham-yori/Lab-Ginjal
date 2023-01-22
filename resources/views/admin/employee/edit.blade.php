@extends('admin.layout.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Hospital Employee Data</h1>
    </div>

    <div class="card shadow mb-4">

        <div class="card-body">
            <form action="/employee/update" method="POST">
                @csrf
                <input type="hidden" value="{{$user->id}}" name="userID">
                <div class="form-group">
                    <label for="user_name">Name</label>
                    <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" id="user_name" value="{{(old('user_name')!=null) ? old('user_name'):$employee->name}}" autocomplete="off" required>
                    @error('user_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ (old('address')!=null) ? old('address'):$employee->address }}" autocomplete="off" required>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number </label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" value="{{ (old('phone_number')!=null) ? old('phone_number'):$employee->phone_number }}" autocomplete="off" required>
                    @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control" id="role">
                        <option value="1" {{ ($employee->role_id == '1') ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ ($employee->role_id == '2') ? 'selected' : '' }}>Laborant</option>
                        <option value="3" {{ ($employee->role_id == '3') ? 'selected' : '' }}>Doctor</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ (old('email')!=null) ? old('email'):$user->email }}" autocomplete="off" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Optional New Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}" autocomplete="off">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-md-12 text-center">
                    <a href="/employee" class="btn btn-danger">Cancel</a>
                    <input type="submit" name="submit" class="btn btn-primary" id="" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection
