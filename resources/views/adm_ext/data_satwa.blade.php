@extends('adm_ext.MainAdm')

@section('satwa')
active
@endsection

@section('breadcrumbs')
Satwa
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Satwa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Satwa</th>
                            <th>Ras</th>
                            <th>Tgl Lahir</th>
                            <th>Usia</th>
                            <th>Jk</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Satwa</th>
                            <th>Ras</th>
                            <th>Tgl Lahir</th>
                            <th>Usia</th>
                            <th>Jk</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($satwa as $item)
                        <tr>
                            <td>{{$item->nama_satwa}}</td>
                            <td>{{$item->nama_ras}}</td>
                            <td>{{$item->tgl_lahir}}</td>
                            <td>{{ Carbon\Carbon::parse($item->tgl_lahir)->diffInYears() }} Thn/
                                {{
                                Carbon\Carbon::parse($item->tgl_lahir)->diffInMonths() -
                                (Carbon\Carbon::parse($item->tgl_lahir)->diffInYears()*12)
                                }} Bln/
                                {{
                                Carbon\Carbon::parse($item->tgl_lahir)->diffInDays() -
                                (Carbon\Carbon::parse($item->tgl_lahir)->diffInMonths()*30)
                                }} Hari
                            </td>
                            <td>
                                @if ($item->jk == '1')
                                <span class="badge badge-primary">Jantan</span>
                                @else
                                <span class="badge badge-danger">Betina</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->status == '1')
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Non-Active</span>
                                @endif
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#editData{{$item->id_satwa}}"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#deleteData{{$item->id_satwa}}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <!-- Add Modal-->
                        <div class="modal fade" id="editData{{$item->id_satwa}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Satwa</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/edit_satwa/'.$item->id_satwa) }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="mb-3 col-sm-12">
                                                    <label for="" class="form-label">Nama Satwa</label>
                                                    <input type="text" class="form-control" name="nama_satwa" id=""
                                                        aria-describedby="helpId" value="{{ $item->nama_satwa }}"
                                                        required>
                                                    <small id="helpId" class="form-text text-muted"></small>
                                                </div>
                                                <div class="mb-3 col-sm-12">
                                                    <label for="" class="form-label">Tgl Lahir</label>
                                                    <input type="date" class="form-control" name="tgl_lhr" id=""
                                                        aria-describedby="helpId" value="{{ $item->tgl_lahir }}"
                                                        required>
                                                    <small id="helpId" class="form-text text-muted"></small>
                                                </div>
                                                <div class="mb-3 col-sm-12">
                                                    <label for="" class="form-label">Ras</label>
                                                    <select class="form-control" name="ras" id="" required>
                                                        <option value="{{ $item->ras }}" selected>{{
                                                            $item->nama_ras }}</option>
                                                        <option value="" disabled>===============</option>
                                                        @foreach ($ras as $r)
                                                        <option value="{{ $r->id_ras }}">{{ $r->nama_ras }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-sm-12">
                                                    <label for="" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-control" name="jk" id="" required>
                                                        @if ($item->jk == '1')
                                                        <option value="1" selected>Jantan</option>
                                                        <option value="2">Betina</option>
                                                        @else
                                                        <option value="1">Jantan</option>
                                                        <option value="2" selected>Betina</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-sm-4">
                                                    <label for="" class="form-label">Tinggi (cm)</label>
                                                    <input type="number" class="form-control" name="tinggi" id=""
                                                        aria-describedby="helpId" value="{{ $item->tinggi }}" required>
                                                    <small id="helpId" class="form-text text-muted"></small>
                                                </div>
                                                <div class="mb-3 col-sm-4">
                                                    <label for="" class="form-label">BB (kg)</label>
                                                    <input type="number" class="form-control" name="bb" id=""
                                                        aria-describedby="helpId" value="{{ $item->bb }}" required>
                                                    <small id="helpId" class="form-text text-muted"></small>
                                                </div>
                                                <div class="mb-3 col-sm-4">
                                                    <label for="" class="form-label">Panjang (cm)</label>
                                                    <input type="number" class="form-control" name="panjang" id=""
                                                        aria-describedby="helpId" value="{{ $item->panjang }}" required>
                                                    <small id="helpId" class="form-text text-muted"></small>
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="" class="form-label">Stambum</label>
                                                    <select class="form-control" name="stambum" id="" required>
                                                        @if ($item->stambum == '1')
                                                        <option value="1" selected>Yes</option>
                                                        <option value="2">No</option>
                                                        @else
                                                        <option value="1">Yes</option>
                                                        <option value="2" selected>No</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label for="" class="form-label">Vaccine</label>
                                                    <select class="form-control" name="vaccine" id="" required>
                                                        @if ($item->vaccine == '1')
                                                        <option value="1" selected>Yes</option>
                                                        <option value="2">No</option>
                                                        @else
                                                        <option value="1">Yes</option>
                                                        <option value="2" selected>No</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-sm-12">
                                                    <label for="" class="form-label">Status</label>
                                                    <select class="form-control" name="status" id="" required>
                                                        @if ($item->status == '1')
                                                        <option value="1" selected>Active</option>
                                                        <option value="2">Non Active</option>
                                                        @else
                                                        <option value="1">Active</option>
                                                        <option value="2" selected>Non Active</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                <form action="{{ url('/add_satwa') }}" method="post">
                    @csrf
                    <div class="row">
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
                                @foreach ($ras as $r)
                                <option value="{{ $r->id_ras }}">{{ $r->nama_ras }}</option>
                                @endforeach
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
                            <input type="number" class="form-control" name="tinggi" id="" aria-describedby="helpId"
                                placeholder="" required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="" class="form-label">BB</label>
                            <input type="number" class="form-control" name="bb" id="" aria-describedby="helpId"
                                placeholder="" required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                        <div class="mb-3 col-sm-4">
                            <label for="" class="form-label">Panjang</label>
                            <input type="number" class="form-control" name="panjang" id="" aria-describedby="helpId"
                                placeholder="" required>
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