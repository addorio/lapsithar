@extends('base.kepala_base')
@section('content')
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div id="accordion-one" class="accordion">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa" aria-hidden="true"></i>
                Filter data {{$this->session->userdata('tanggal_mulai')}} {{$this->session->userdata('tanggal_akhir')}} {{$this->session->userdata('keterangan_laporan')}} {{$this->session->userdata('opd_laporan')}} {{$this->session->userdata('bidang_laporan')}}
              </h5>
            </div>
            <div id="collapseOne" class="collapse hide" data-parent="#accordion-one">
              {{form_open("","id='form-filter'")}}
              <div class="card-body"> 

                <div class="row">
                  <div class="form-group col-3">
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                      <input type="text" id="start" name="start_date" class="filter form-control datetimepicker-input" data-target="#datetimepicker2" autocomplete="off" placeholder="Dari tanggal" />
                    </div>
                  </div>
                  <div class="form-group col-3">
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">

                      <input type="text" id="end" name="end_date" class="filter form-control datetimepicker-input" data-target="#datetimepicker2" autocomplete="off" placeholder="Hingga tanggal" />
                    </div>
                  </div>
                  <div class="form-group col-3">
                    <select class="form-control" id="keterangan-filter" name="ket">
                      <option value="">Pilih Keterangan</option>
                      <option value="Selesai" class="text-success">Selesai</option>
                      <option value="Belum Selesai" class="text-danger">Belum Selesai</option>
                    </select>
                  </div>
                  <div class="form-group col-3">
                    <select class="form-control" id="bidang-filter" name="bidang">
                      <option value="">Pilih Bidang</option>
                      @foreach ($bidang as $row)
                      <option value="{{$row->nama_bidang}}">{{$row->nama_bidang}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-12">
                    <select class="form-control" id="opd-filter" name="opd">
                      <option value="">Pilih OPD</option>
                      @foreach ($opd as $row)
                      <option value="{{$row->id_opd}}">{{$row->nama_opd}}</option>
                      @endforeach
                    </select>
                  </div>

                </div>

                <div class="row">
                  <div class="col-12 col-lg-6">
                    <div class="form-group">
                      {{form_submit("submit","Filter","class='btn mb-1 btn-flat btn-outline-primary input-group'")}}
                    </div>
                  </div>
                  <div class="col-12 col-lg-6">
                    <div class="form-group">
                      {{form_submit("submit","Reset","class='btn mb-1 btn-flat btn-outline-dark input-group'")}}
                    </div>
                  </div>
                </div>
              </div>
              {{form_close()}}
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Rekapitulasi Laporan</h5>
            <div class="table-responsive">
              <table id="table" class="table table-bordered nowrap display responsive txt-sm" cellspacing="0">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>OPD</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Bidang</th>
                    <th>Isi</th>
                    <th>Tindakan</th>
                    <th>Ket</th>
                    <th>Nama</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody style="list-style:none;">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('kepala.modal')
@endsection

@section('js')
<script type="text/javascript">
  var save_method; //for save method string
  var table;
  var base_url = '<?php echo base_url(); ?>';
  var user = '<?= $user->nama_opd ?>';

  $(document).ready(function() {

    $('.summernote').summernote({
      height: 150,
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],
      tooltip: false
    });


    $('#form-filter').submit('click', function() {
      $.ajax({
        url: "<?php echo site_url('kepala/filter_data'); ?>",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(data) {
          $('#start').val("");
          $('#end').val("");
          $('#keterangan-filter').val("").trigger("change");
          $('#opd-filter').val("").trigger("change");
          $('#bidang-filter').val("").trigger("change");
          swal(
            'Sedang memfilter..',
            'Tunggu sebentar..',
            'info'
          );
          $('#collapseOne').attr("class", "collapse hide");
          table.ajax.reload();
        }
      });
      return false;
    });



    //datatables
    table = $('#table').DataTable({
      "bInfo": false,
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      // "responsive": true,
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"]],
      responsive: {
        details: {
          type: 'column',
          target: 'tr'
        }
      },
      dom: 'lfrtp',
      "order": [], //Initial no order.

      // Load data for the table's content from an Ajax source
      "ajax": {
        "url": "{{site_url('kepala/ajax_list')}}",
        "type": "POST"
      },

      //Set column definition initialisation properties.
      "columnDefs": [{
          "targets": [0, -1, -2], //last column
          "orderable": false, //set not orderable
        },
        {
          responsivePriority: 1,
          targets: [0, 1, -1]
        },
        {
          responsivePriority: 1,
          targets: [0, 1, 2, 4, 7]
        },
        {
          responsivePriority: 2,
          targets: [-1, -2]
        },
      ],

    });;

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function() {
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });
    $("textarea").change(function() {
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });
    $("select").change(function() {
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });

  });




  function lihat_laporan(id) {
    $.ajax({
      url: "{{site_url('kepala/ambil_satu_lap/')}}" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('#modal_lihatlaporan').modal('show'); // show bootstrap modal when complete loaded

        var namaFile = data.lihat_file;
        var src = "{{site_url('upload/'.'" + namaFile + "'.'')}}";
        $(".modal-body #nama-file-detail").attr("src", src);

        $('#lihat-nama-opd').html(data.lihat_nama_opd);
        $('#lihat-tanggal').html(data.lihat_tanggal);
        $('#lihat-judul').html(data.lihat_judul);
        $('#lihat-nama-bidang').html(data.lihat_nama_bidang);
        $('#lihat-isi-laporan').html(data.lihat_isi_laporan);
        $('#lihat-tindakan-laporan').html(data.lihat_tindakan);
        if (data.lihat_keterangan == 'Selesai') {
          $('#lihat-keterangan').html(data.lihat_keterangan).attr("class", "text-success");
        } else {
          $('#lihat-keterangan').html(data.lihat_keterangan).attr("class", "text-danger");
        }
        $('#lihat-pelapor').html(data.lihat_nama);
        $('.modal-title').text('Detail Laporan'); // Set Title to Bootstrap modal title
      }
    });
  }

  function reload_table() {
    table.ajax.reload(null, false); //reload datatable ajax 
  }
</script>
@endsection