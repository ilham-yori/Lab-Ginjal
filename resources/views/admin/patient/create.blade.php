@extends('admin.layout.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Hospital Patient Data</h1>
    </div>

    <div class="card shadow mb-4">

        <div class="card-body">
            <form action="/patient/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user_name">Name</label>
                    <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" id="user_name" value="{{   old('user_name') }}" autocomplete="off" required>
                    @error('user_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}" autocomplete="off" required>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number </label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" autocomplete="off" required>
                    @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12 text-center">
                    <a href="/patient" class="btn btn-danger">Cancel</a>
                    <input type="submit" name="submit" class="btn btn-primary" id="" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection
