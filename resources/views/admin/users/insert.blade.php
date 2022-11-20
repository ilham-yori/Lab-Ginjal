@extends('admin.layout.main')
@section('content')    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add User Data</h1>                           
    </div> 

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Data</h6>
        </div>
        
        <div class="card-body">
            <form action="/admin/user" method="POST">
                {{ csrf_field() }}                
                <div class="form-group">
                    <label for="user_name">Name</label>
                    <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" id="user_name" value="{{ old('user_name') }}" required autofocus>                    
                    @error('user_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>                    
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}" required>                    
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="col-md-12 text-center">                                                            
                    <a href="/admin/user" class="btn btn-danger">Cancel</a>
                    <input type="submit" name="submit" class="btn btn-primary" id="" value="Save">
                </div>
            </form>
        </div>
    </div>    
@endsection