@extends('MainApp')

@section('trah')
active text-dark
@endsection

@section('breadcrumbs')
Trah
@endsection

@section('content')
<div class="col-lg-12 ">
  <div class="row mt-3">
    {{-- --}}
    <div class="col-lg-2">
      {{-- <div class="card mb-3">
        <div class="card-body p-3">
          <div class="row">
            <div class="form-group">
              <label for="exampleFormControlSelect2">Example multiple select</label>
              <select multiple class="form-control" id="exampleFormControlSelect2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>s
          </div>
        </div>
      </div> --}}
      <div class="card mb-3 dotted">
        <div class="card-body p-3">
          <div class="row">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Trah : </label>
              <select class="form-control" name="select_trah" id="s_trah">
                <option disabled selected>-- SELECT TRAH --</option>
                @foreach ($response as $item)
                <option value="{{ $item->id_ras }}">{{ $item->nama_ras }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <hr class="horizontal dark my-2">
      <h6>Result :</h6>
      {{-- --}}
      <div class="card mb-3">
        <div class="card-body p-3">
          <div class="row">
            <div class="form-group">
              <label for="exampleFormControlSelect2">Jantan :</label>
              <select multiple class="form-control" name="satwa" id="dt_jantan">

              </select>
            </div>
          </div>
        </div>
      </div>
      {{-- --}}
      <div class="card mb-3">
        <div class="card-body p-3">
          <div class="row">
            <div class="form-group">
              <label for="exampleFormControlSelect2">Betina :</label>
              <select multiple class="form-control" name="satwa" id="dt_betina">

              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- --}}
    <div class="col-lg-10">
      <div class="row">
        <div class="col-lg-12 mb-2">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold" id="nama_ras"><i class="fa fa-arrow-left"></i></p>
                    <h5 class="font-weight-bolder" id="nama_satwa">Select Trah First.</h5>
                    {{-- <p class="mb-5">
                      <dd>Usia : </dd>
                      <dt id="usia"></dt>
                    </p> --}}
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-light border-radius-lg">
                    <div class="position-relative d-flex align-items-center justify-content-center foto_satwa">
                      <div id="foto_satwa"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- --}}
      </div>
      {{-- --}}
    </div>
    {{-- paging --}}
    {{-- <div class="col-lg-12 mt-5">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="javascript:;" tabindex="-1">
              <i class="fa fa-angle-left"></i>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
          <li class="page-item active"><a class="page-link" href="javascript:;">2</a></li>
          <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
          <li class="page-item">
            <a class="page-link" href="javascript:;">
              <i class="fa fa-angle-right"></i>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
    </div> --}}
  </div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- <script src="{{ asset('assets/js/airarti_js/get_jantan.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/airarti_js/get_jantan') }}"></script> --}}
{{-- select trah --}}
<script>
  $('#s_trah').change(function () {
   var r_id = $('#s_trah').val();
   if (r_id) {
      // jantan
    $.ajax({
         type: "GET",
         url: "/data_satwa_ras_jantan?id="+r_id  ,
         dataType: 'JSON',
         success: function (data) {
            if (data) {
               $("#dt_jantan").empty();
               $.each(data, function (index, res) {
                  $("#dt_jantan").append('<option value="' + res.id_satwa + '">' + res.nama_satwa + '</option>');
                    console.log(data);
                });
            } else {
               $("#dt_jantan").empty();
               console.log(err);
            }
         }
      });
      // betina
      $.ajax({
         type: "GET",
         url: "/data_satwa_ras_betina?id="+r_id  ,
         dataType: 'JSON',
         success: function (data) {
            if (data) {
               $("#dt_betina").empty();
               $.each(data, function (index, res) {
                  $("#dt_betina").append('<option value="' + res.id_satwa + '">' + res.nama_satwa + '</option>');
                    console.log(data);
                });
            } else {
               $("#dt_betina").empty();
               console.log(err);
            }
         }
      });
      // 
   } else {
      $("#dt_jantan").empty();
   }
  });
</script>
{{-- select by jk --}}
<script>
  $('#dt_jantan').change(function () {
   var id_s = $('#dt_jantan').val();
   if (id_s) {
      // jantan
    $.ajax({
         type: "GET",
         url: "/data_satwa_by_id?id="+id_s  ,
         dataType: 'JSON',
         success: function (data) {
            if (data) {
               $("#nama_ras").empty();
               $("#nama_satwa").empty();
               $("#foto_satwa").empty();
               $.each(data, function (index, item) {
                  $("#nama_ras").append(item.nama_ras);
                  $("#nama_satwa").append(item.nama_satwa);
                  $("#foto_satwa").append('<img class="position-inline z-index-2 pt-4 py-4" src="http://localhost:8000/'+item.foto_satwa+'" style="heigth:200px !Important;" alt="rocket">');
                  // $("#test").append('cek');
                  // console.log(data);
                });
            } else {
               $("#nama_ras").empty();
               $("#nama_satwa").empty();
               $("#foto_satwa").empty();
              //  console.log(err);
            }
         }
      });

   } else {
      $("#h_search").empty();
   }
  });
</script>
<script>
  $('#dt_betina').change(function () {
   var id_s = $('#dt_betina').val();
   if (id_s) {
      // jantan
    $.ajax({
         type: "GET",
         url: "/data_satwa_by_id?id="+id_s  ,
         dataType: 'JSON',
         success: function (data) {
            if (data) {
              $("#nama_ras").empty();
               $("#nama_satwa").empty();
               $("#foto_satwa").empty();
               $("#usia").empty();
              //  $("#test").empty();
               $.each(data, function (index, item) {
                  $("#nama_ras").append(item.nama_ras);
                  $("#nama_satwa").append(item.nama_satwa);
                  $("#usia").append(item.umur_thn);
                  $("#foto_satwa").append('<img class="position-inline z-index-2 pt-4 py-4" src="http://localhost:8000/'+item.foto_satwa+'" style="heigth:50% !Important; width:90% !important;" alt="satwa">');
                  // $("#test").append('cek');
                  console.log(data);
                });
            } else {
               $("#nama_ras").empty();
               $("#nama_satwa").empty();
               $("#foto_satwa").empty();
               $("#usia").empty();

               console.log(err);
            }
         }
      });

   } else {
      $("#h_search").empty();
   }
  });
</script>
@endsection