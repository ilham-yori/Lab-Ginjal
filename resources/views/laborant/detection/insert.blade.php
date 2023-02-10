@extends('laborant.layout.main')
@section('scanner')    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Detection Data</h1>                           
    </div> 

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detection Data</h6>
        </div>
        
        <div class="card-body">
            <form action="/laborant/detection/store" method="POST">
                {{ csrf_field() }}                
                <div class="form-group">
                    <label for="patient">Patient</label>
                    <select name="patient" class="form-control" id="patient" required>
                        @foreach ($patients as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>                  
                    @error('patient')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control @error('iamge') is-invalid @enderror" name="iamge" id="iamge" value="{{ old('image') }}" required>                    
                    @error('image')
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