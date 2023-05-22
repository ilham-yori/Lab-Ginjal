@extends('doctor.layout.main')
@section('validation')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Patient Detail Data Validate </h1>
    </div>

    <div class="row">
        <div class="col-sm-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Data</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Patient Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $detectionHistory->patient->name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Laborant Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $detectionHistory->laborant->name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Detection Date</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> {{ Carbon\Carbon::parse($detectionHistory->date_detection )->format('d / M / Y | H:m') }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Prediction</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $detectionHistory->prediction }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Validation</h6>
                </div>
                <div class="card-body">
                    <form action="/doctor/validate/{{$detectionHistory->id}}/store" method="POST">
                        @csrf
                        <input type="hidden" value="{{$detectionHistory->id}}" name="patientID">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Doctor Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ auth()->user()->employee->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Doctor Validation</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select name="validation" class="form-control" id="validation">
                                        <option value="Batu Ginjal">Batu Ginjal</option>
                                        <option value="Ginjal Normal">Ginjal Normal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Validation Date</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"> {{ Carbon\Carbon::parse(now())->format('d / M / Y') }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 text-right">
                            <a href="/doctor/detail/{{$detectionHistory->id}}" class="btn btn-danger">Cancel</a>
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
                    <a href="#" data-toggle="modal" data-target="#imageModal"
                        onclick="showImage('{{ $detectionHistory->image }}')" title="Lihat Foto">
                        <img src="{{ url('') }}/storage/{{ $detectionHistory->image }}" alt="image"
                            style="width:256px; height:512px"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Ultrasonography Ginjal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" id="detectionImage" style="width:100%; height:auto" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        function showImage(x) {
            $('#detectionImage').attr('src', "{{ url('') }}/storage/" + x);
        }
    </script>
@endsection
