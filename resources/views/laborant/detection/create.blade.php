@extends('laborant.layout.main')
@section('scanner')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Detection Data</h1>
    </div>

    <div class="row">
        <div class="col-sm-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Patient Data</h6>
                </div>
                <div class="card-body">
                    <form action="/laborant/detection/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="patient">Patient</label>
                            <select name="patient" class="form-control @error('patient') is-invalid @enderror" id="patient">
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
                            <label for="prediction">Prediction</label>
                            <input type="text" name="prediction" class="form-control @error('prediction') is-invalid @enderror" id="prediction" readonly>

                            @error('prediction')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="img">Image</label>
                            <input type="file" class="form-control @error('img') is-invalid @enderror" accept="image/*"
                                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"
                                name="img" id="img" value="{{ old('img') }}">
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
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Ultrasonography Image</h6>
                </div>
                <div class="card-body text-center">
                    <img id="output" src="" width="256" height="512">
                </div>
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" onclick="upImage()">Predict</button>
                        <div style="font-style:italic" id="progress"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

<script>
    function upImage() {
        $('#progress').innertHTML = 'Loading...';
        var fileInput = $('#img')[0];
        var file = fileInput.files[0];

        if (file) {
            var formData = new FormData();
            formData.append('image', file);

            $.ajax({
                url: 'http://127.0.0.1:5000/predict', //API URL
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Success Sending Image
                    if (response == "0") {
                        $('#prediction').val('Batu Ginjal')
                    } else if (response == "1") {
                        $('#prediction').val('Ginjal Normal')
                    }
                    $('#progress').innertHTML = '';
                },
                error: function(response) {
                    $('#progress').innertHTML = '';
                    alert('Terjadi kesalahan : ' + response);
                }
            });
        }
    }
</script>
