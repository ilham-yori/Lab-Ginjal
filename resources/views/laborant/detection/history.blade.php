@extends('laborant.layout.main')
@section('scanner')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Patient Detection Data</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Patient Detection Data</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Patient</th>
                        <th>Prediction</th>
                        <th>Date Detection</th>
                        <th>Validation Detection</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                </tfoot>
                <tbody>
                    @foreach ($detectionHistory as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $item->patient->name}}
                                </td>
                                <td>
                                    {{ $item->prediction}}
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($item->date_detection)->format('d / M / Y ') }}
                                </td>
                                <td>
                                    {{ $item->validation_detection}}
                                </td>
                                <td align="center">
                                    <a href="#" class="btn btn-sm btn-primary mr-1" data-toggle="modal"
                                        data-target="#imageModal" onclick="showImage('{{ $item->image }}')" title="Lihat Foto">
                                        <i class="bi bi-image"></i>  <b> Lihat Gambar</b></a>
                                </td>
                                <td align="center">
                                    <div class="d-flex justify-content-center" style="width:auto">
                                        <a href="/laborant/detail/{{ $item->id }}"class="btn btn-sm btn-info" title="Detail">
                                            <span class="fas fa-fw fa-id-card"></span><b> Detail Data</b></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
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
    function showImage(x){
        $('#detectionImage').attr('src', "{{ url('') }}/storage/" + x);
    }
</script>
@endsection
