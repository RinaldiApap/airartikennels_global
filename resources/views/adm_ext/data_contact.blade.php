@extends('adm_ext.MainAdm')

@section('contact')
active
@endsection

@section('breadcrumbs')
Contact
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="d-flex justify-content-end pb-2">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop"><i class="fa fa-plus"></i> ADD</button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Contact</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Contact</th>
                                    <th>No Tlp</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
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

@endsection