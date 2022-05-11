@extends('adm_ext.MainAdm')

@section('satwa')
active
@endsection

@section('breadcrumbs')
Award
@endsection

@section('content')
<div class="container-fluid">


    <div class="d-flex justify-content-end pb-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addData"><i
                class="fa fa-plus"></i>
            ADD</button>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Award - <b class="text-danger">{{ $nama_satwa
                    }}</b>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Satwa</th>
                            <th>Award</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Satwa</th>
                            <th>Award</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-start pb-2">
        <a href="{{ url('adm_ext_data_satwa') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i>
            Kembali</a>
    </div>
</div>


<!-- Add Modal-->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data Award</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <label for="formFile" class="form-label">Nama Award</label>
                            <input class="form-control" type="text" id="" name="foto_satwa" accept="image/*">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="formFile" class="form-label">Tgl Award</label>
                            <input class="form-control" type="date" id="" name="foto_satwa" accept="image/*">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="formFile" class="form-label">Keterangan</label>
                            <input class="form-control" type="text" id="" name="foto_satwa" accept="image/*">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection