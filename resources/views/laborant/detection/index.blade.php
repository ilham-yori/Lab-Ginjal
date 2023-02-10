@extends('laborant.layout.main')
@section('scanner')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detection Data</h1>
    <a href="/laborant/detection/add" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><span class="fas fa-fw fa-plus fa-sm text-white-50"></span> Add Detection</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detection Data</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Image</th>
                        <th>Doctor</th>                        
                        <th>Patient</th>                        
                        <th>Prediction</th>                        
                        <th>Date Detection</th>                        
                        <th>Validation Detection</th>                        
                        <th>Validation Date Detection</th>
                        <th>Action</th>
                    </tr>
                </thead>
                </tfoot>
                <tbody>                    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection