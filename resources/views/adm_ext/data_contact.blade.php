@extends('adm_ext.MainAdm')

@section('contact')
active
@endsection

@section('breadcrumbs')
Contact
@endsection

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-end pb-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addData"><i
                class="fa fa-plus"></i> ADD</button>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Contact</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tgl Posting</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Judul</th>
                            <th>Tgl Posting</th>
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
</div>

<!-- Add Modal-->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data Satwa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <label for="formFile" class="form-label">Foto Satwa</label>
                            <input class="form-control" type="file" id="" name="foto_satwa" accept="image/*">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="" class="form-label">Nama Satwa</label>
                            <input type="text" class="form-control" name="nama_satwa" id="" aria-describedby="helpId"
                                placeholder="Nama Satwa" required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="" class="form-label">Tgl Lahir</label>
                            <input type="date" class="form-control" name="tgl_lhr" id="" aria-describedby="helpId"
                                placeholder="" required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="" class="form-label">Ras</label>
                            <select class="form-control" name="ras" id="" required>
                                <option value="" selected disabled>-- PILIH --</option>

                            </select>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="jk" id="" required>
                                <option value="" selected disabled>-- PILIH --</option>
                                <option value="1">Jantan</option>
                                <option value="2">Betina</option>
                            </select>
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="" class="form-label">Tinggi</label>
                            <input type="text" class="form-control" name="tinggi" id="" aria-describedby="helpId"
                                placeholder=""
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="" class="form-label">BB</label>
                            <input type="text" class="form-control" name="bb" id="" aria-describedby="helpId"
                                placeholder=""
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="" class="form-label">Panjang</label>
                            <input type="text" class="form-control" name="panjang" id="" aria-describedby="helpId"
                                placeholder=""
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="" class="form-label">Stambum</label>
                            <select class="form-control" name="stambum" id="" required>
                                <option value="" selected disabled>-- PILIH --</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="" class="form-label">Vaccine</label>
                            <select class="form-control" name="vaccine" id="" required>
                                <option value="" selected disabled>-- PILIH --</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
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