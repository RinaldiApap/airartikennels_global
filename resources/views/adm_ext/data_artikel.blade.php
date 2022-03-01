@extends('adm_ext.MainAdm')

@section('artikel')
active
@endsection

@section('breadcrumbs')
Artikel
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="d-flex justify-content-end pb-2">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-plus"></i> ADD
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Artikel</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Tgl Post</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- input --}}
                <div class="card">

                    <div class="card-body card-block">
                        <div class="form-group">
                            <label class=" form-control-label">Nama Satwa</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-paw"></i></div>
                                <input class="form-control">
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Ras</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                <select data-placeholder="Pilih Ras..." class="standardSelect form-control"
                                    tabindex="1">
                                    <option value="" disabled selected>-- PILIH --</option>
                                    <option value="United States">United States</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Aland Islands">Aland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                </select>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Jenis Kelamin</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-genderless"></i></div>
                                <select data-placeholder="Pilih Ras..." class="standardSelect form-control"
                                    tabindex="1">
                                    <option value="" disabled selected>-- PILIH --</option>
                                    <option value="1">Jantan</option>
                                    <option value="2">Betina</option>
                                </select>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">DOB</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="date" class="form-control">
                            </div>
                            <small class="form-text text-muted">31/12/1990</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Stambum</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-certificate"></i></div>
                                <select data-placeholder="Pilih Ras..." class="standardSelect form-control"
                                    tabindex="1">
                                    <option value="" disabled selected>-- PILIH --</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Vaccine</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-stethoscope"></i></div>
                                <select data-placeholder="Pilih Ras..." class="standardSelect form-control"
                                    tabindex="1">
                                    <option value="" disabled selected>-- PILIH --</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        {{-- --}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection