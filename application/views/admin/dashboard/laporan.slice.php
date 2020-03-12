@extends('base.main_base')
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
                Filter data
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
                {{form_close()}}
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rekapitulasi Laporan
                <span>
                  <button class="btn mb-1 btn-flat btn-outline-primary float-right" onclick="add_laporan()"> Tambah Laporan</button>
                  <button class="btn mb-1 btn-flat btn-outline-dark float-right buat_laporan"> Cetak PDF</button>
                </span></h5>
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
  @include('admin.dashboard.modal')
  @endsection

  @section('js')
  <script type="text/javascript">
    var save_method; //for save method string
    var table;
    var base_url = '<?php echo base_url(); ?>';
    var user = '<?= $user->nama_opd ?>';

    $(document).ready(function() {

      // $('tbody').on('click', 'td', function () {

      //      if ($(this).index() == 7 ) { // provide index of your column in which you prevent row click here is column of 4 index
      //          return;
      //      }

      //         // you can do additional functionality by clicking on this column here                         
      // });


      // CKEDITOR.replace( 'isi_laporan' );
      // CKEDITOR.replace( 'tindakan' );
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

      // $('#start').on('keyup', function() {
      //   dataTable
      //     .columns(2)
      //     .search(this.value)
      //     .draw();
      // });
      // $('#end').on('keyup', function() {
      //   dataTable
      //     .columns(2)
      //     .search(this.value)
      //     .draw();
      // });

      $('#form-filter').submit('click', function() {
        $.ajax({
          url: "<?php echo site_url('dashboard/filter_data'); ?>",
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
              'Loading..',
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
        "lengthMenu": [
          [10, 25, 50, 100, -1],
          [10, 25, 50, 100, "All"]
        ],
        responsive: {
          details: {
            type: 'column',
            target: 'tr'
          }
        },
        dom: 'Blfrtp',
        buttons: [{
            extend: 'excelHtml5',
            className: 'btn mb-1 btn-flat btn-outline-success',
            title: 'Laporan',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
            }
          },
          // {
          //   extend: 'pdfHtml5',
          //   className: 'btn mb-1 btn-flat btn-outline-danger',
          //   title: user,
          //   orientation: 'landscape',
          //   pageSize: 'FOLIO',
          //   exportOptions: {
          //     columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
          //   },
          //   customize: function(doc) {
          //     //Remove the title created by datatTables
          //     doc.content.splice(0, 1);
          //     //Create a date string that we use in the footer. Format is dd-mm-yyyy
          //     var now = new Date();
          //     var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
          //     doc.pageMargins = [45, 75, 45, 60];
          //     // Set the font size fot the entire document
          //     doc.defaultStyle.fontSize = 9;
          //     // Set the fontsize for the table header
          //     doc.styles.tableHeader.fontSize = 9;
          //     // Create a header object with 3 columns
          //     // Left side: Logo
          //     // Middle: brandname
          //     // Right side: A document title
          //     doc['header'] = (function() {
          //       return {
          //         columns: [{
          //           alignment: 'center',
          //           text: user,
          //           fontSize: 12,
          //           margin: [300, 15],
          //         }],
          //         margin: 20
          //       }
          //     });
          //     // Create a footer object with 2 columns
          //     // Left side: report creation date
          //     // Right side: current page and total pages
          //     doc['footer'] = (function(page, pages) {
          //       return {
          //         columns: [{
          //             alignment: 'left',
          //             text: ['Dibuat pada: ', {
          //               text: jsDate.toString()
          //             }]
          //           },
          //           {
          //             alignment: 'right',
          //             text: ['Halaman ', {
          //               text: page.toString()
          //             }, ' dari ', {
          //               text: pages.toString()
          //             }]
          //           }
          //         ],
          //         margin: 20
          //       }
          //     });
          //     // Change dataTable layout (Table styling)
          //     // To use predefined layouts uncomment the line below and comment the custom lines below
          //     // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
          //     var objLayout = {};
          //     objLayout['hLineWidth'] = function(i) {
          //       return .5;
          //     };
          //     objLayout['vLineWidth'] = function(i) {
          //       return .5;
          //     };
          //     objLayout['hLineColor'] = function(i) {
          //       return '#aaa';
          //     };
          //     objLayout['vLineColor'] = function(i) {
          //       return '#aaa';
          //     };
          //     objLayout['paddingLeft'] = function(i) {
          //       return 4;
          //     };
          //     objLayout['paddingRight'] = function(i) {
          //       return 4;
          //     };
          //     doc.content[0].layout = objLayout;

          //     doc.content[0].table.widths = [
          //       '2%',
          //       '15%',
          //       '12%',
          //       '10%',
          //       '10%',
          //       '18%',
          //       '15%',
          //       '8%',
          //       '10%',
          //     ]
          //   }
          // }
          // {
          //     extend: 'colvis',
          //     text: 'Show/Hide Columns',
          //     className: 'btn btn-danger btn-lg',
          //     columnText: function ( dt, idx, title ) {
          //         return (idx+1)+': '+title;
          //     }
          // } 
        ],
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "{{site_url('dashboard/ajax_list')}}",
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



    function add_laporan() {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#isi-laporan').summernote('reset');
      $('#tindakan-laporan').summernote('reset');

      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Laporan'); // Set Title to Bootstrap modal title

      $('#file-preview').hide(); // hide file preview modal

      $('#label-file').text('Upload file'); // label file upload
    }

    function edit_laporan(id) {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string


      //Ajax Load data from ajax
      $.ajax({
        url: "<?php echo site_url('dashboard/ajax_edit') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('[name="id_laporan"]').val(data.id_laporan);
          $('[name="id_opd"]').val(data.id_opd);
          $('[name="tanggal"]').val(data.tanggal);
          $('[name="judul"]').val(data.judul);
          $('[name="nama_bidang"]').val(data.nama_bidang);
          $('[name="isi_laporan"]').summernote('code', data.isi_laporan);
          $('[name="tindakan"]').summernote('code', data.tindakan);
          $('[name="keterangan"]').val(data.keterangan);
          $('[name="nama"]').val(data.nama);
          $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Ubah Laporan'); // Set title to Bootstrap modal title

          $('#file-preview').show(); // show file preview modal

          if (data.file) {
            $('#label-file').text('Change file'); // label file upload
            $('#file-preview div').html('<img src="' + base_url + 'upload/' + data.file + '" class="img-responsive">'); // show file
            $('#file-preview div').append('<input type="checkbox" name="file" value="' + data.file + '"/> Remove file when saving'); // remove file

          } else {
            $('#label-file').text('Upload file'); // label file upload
            $('#file-preview div').text('(No file)');
          }


        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error get data from ajax');
        }
      });
    }

    function lihat_laporan(id) {
      $.ajax({
        url: "{{site_url('dashboard/ambil_satu_lap/')}}" + id,
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

    function save() {
      $('#btnSave').text('saving...'); //change button text
      $('#btnSave').attr('disabled', true); //set button disable 
      var url;

      if (save_method == 'add') {
        url = "<?php echo site_url('dashboard/ajax_add') ?>";
      } else {
        url = "<?php echo site_url('dashboard/ajax_update') ?>";
      }

      // ajax adding data to database

      var formData = new FormData($('#form')[0]);
      $.ajax({
        url: url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {

          if (data.status) //if success close modal and reload ajax table
          {
            swal(
              'Good job!',
              'Berhasil',
              'success'
            );
            $('#modal_form').modal('hide');
            reload_table();
          } else {
            for (var i = 0; i < data.inputerror.length; i++) {
              $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
              $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
            }
          }
          $('#btnSave').text('save'); //change button text
          $('#btnSave').attr('disabled', false); //set button enable 


        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('File tidak boleh kosong');
          $('#btnSave').text('save'); //change button text
          $('#btnSave').attr('disabled', false); //set button enable 

        }
      });
    }

    $('#table').on("click", ".hapus_record", function() {
      var id = $(this).data('id');
      swal({
          title: "Ingin Menghapus Data?",
          text: "Kamu tidak bisa melihat data ini lagi..",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya, HAPUS!",
          cancelButtonText: "Batalkan",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm) {
          if (isConfirm) {
            // ajax delete data to database
            $.ajax({
              url: "<?php echo site_url('dashboard/ajax_delete') ?>/" + id,
              type: "POST",
              dataType: "JSON",
              success: function(data) {
                swal(
                  'Berhasil!',
                  'Data Terhapus!',
                  'success'
                );
                $('#modal_form').modal('hide');
                reload_table();
              },
              error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
              }
            });
          } else {
            swal("Dibatalkan", "Data tidak jadi dihapus", "error");
          }
        });
      return false;
    });

    $(".buat_laporan").click(function() {

      $('#modal-cetak-laporan').modal('show');
      $('.modal-title').text('Cetak Laporan');
      $("#cetak-laporan").html(
        '<iframe src="{{base_url()}}dashboard/cetak_laporan" width="100%" height="450" frameborder="0" ></iframe>'
      );
    });

    // $(".buat_laporan").click(function() {
    //   var filter_start = $('#start').val();
    //   var filter_end = $('#end').val();
    //   var filter_keterangan = $('#keterangan-filter').val();
    //   var filter_bidang = $('#bidang-filter').val();
    //   var filter_opd = $('#opd-filter').val();


    //   if (filter_start != '' && filter_end != '' && filter_keterangan != '' && filter_bidang != '' && filter_opd != '') {
    //     cetak_laporan(filter_start, filter_end, filter_keterangan, filter_bidang, filter_opd);
    //   } else if (filter_start != '' && filter_end != '' && filter_keterangan != '' && filter_bidang != '') {
    //     cetak_laporan(filter_start, filter_end, filter_keterangan, filter_bidang, filter_opd);
    //   } else if (filter_start != '' && filter_end != '' && filter_keterangan != '' && filter_opd != '') {
    //     cetak_laporan(filter_start, filter_end, filter_keterangan, filter_opd);
    //   } else if (filter_start != '' && filter_end != '' && filter_opd != '') {
    //     cetak_laporan(filter_start, filter_end, filter_opd);
    //   } else if (filter_start != '' && filter_end != '' && filter_keterangan != '') {
    //     cetak_laporan(filter_start, filter_end, filter_keterangan);
    //   } else if (filter_start != '' && filter_end != '' && filter_bidang != '') {
    //     cetak_laporan(filter_start, filter_end, filter_bidang);
    //   } else if (filter_keterangan != '' && filter_opd != '') {
    //     cetak_laporan(filter_keterangan, filter_opd);
    //   } else if (filter_keterangan != '' && filter_bidang != '') {
    //     cetak_laporan(filter_keterangan, filter_bidang);
    //   } else if (filter_opd != '' && filter_bidang != '') {
    //     cetak_laporan(filter_opd, filter_bidang);
    //   } else if (filter_start != '' && filter_end != '') {
    //     cetak_laporan(filter_start, filter_end);
    //   } else if (filter_keterangan != '') {
    //     cetak_laporan(filter_keterangan);
    //   } else if (filter_opd != '') {
    //     cetak_laporan(filter_opd);
    //   } else if (filter_bidang != '') {
    //     cetak_laporan(filter_bidang);
    //   } else {
    //     cetak_laporan('all', 'all', 'all', 'all', 'all');
    //   }

    // });

    // function cetak_laporan(filter_start = 'all', filter_end = 'all', filter_keterangan = 'all', filter_bidang = 'all', filter_opd = 'all') {
    //   $('#modal-cetak-laporan').modal('show');
    //   $('.modal-title').text('Cetak Laporan');
    //   $("#cetak-laporan").html(
    //     '<iframe src="{{base_url()}}dashboard/cetak_laporan/' + filter_start + ',' + filter_end + ',' + filter_keterangan + ',' + filter_bidang + ',' + filter_opd + '" width="100%" height="450" frameborder="0" ></iframe>'
    //   );
    // }
  </script>
  @endsection