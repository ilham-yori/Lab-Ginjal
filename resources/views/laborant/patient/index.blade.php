@extends('laborant.layout.main')
@section('scanner')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Patient History</h1>
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
                            <th>Patient Name</th>
                            <th>Doctor Name</th>
                            <th>Image</th>
                            <th>Prediction</th>
                            <th>Date Detection</th>
                            <th>Validation Status</th>
                            <th>Validation Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detectionHistory as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $item->patient->name }}
                                </td>
                                <td>
                                    {{ $item->employee->name }}
                                </td>
                                <td>
                                    {{ $item->image }}
                                </td>
                                <td>
                                    {{ $item->prediction }}
                                </td>
                                <td>
                                    {{ date_create($item->created_at)->format("d/m/y H:i:s"); }}
                                </td>
                                <td>
                                    {{$item->validation_detection}}
                                </td>
                                <td>
                                    {{ date_create($item->validation_date_detection)->format("d/m/y H:i:s"); }}
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
