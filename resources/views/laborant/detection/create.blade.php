@extends('laborant.layout.main')
@section('scanner')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Detection Data</h1>
    </div>

    <div class="row">
        <div class="col-sm-8">
            <div class="card mb-4">
                <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Patient Data</h6></div>
                <div class="card-body">
                    <form action="/laborant/detection/store" method="POST" enctype="multipart/form-data">
                        @csrf
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
                            <label for="img">Image</label>
                            <input type="file" class="form-control @error('img') is-invalid @enderror" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"
                            name="img" id="img" value="{{ old('img') }}" required>
                            @error('img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12 text-center">
                            <a href="/laborant/history" class="btn btn-danger">Cancel</a>
                            <input type="submit" name="submit" class="btn btn-primary" id="" value="Save">
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-sm">
            <div class="card mb-4">
                <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Ultrasonography Image</h6></div>
                <div class="card-body text-center">
                    <img id="output" src=""  width="256" height="512">
                </div>
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <input type="predict" name="predict" class="btn btn-primary" id="" value="Predict">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
