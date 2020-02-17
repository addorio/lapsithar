@extends('base.user_base')
<style>  
           body  
           {  
                margin:0;  
                padding:0;  
                background-color:#f1f1f1;  
           }  
           .box  
           {  
                width:900px;  
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;  
           }
           td.highlight {
                font-weight: bold;
                color: blue;
            }  
</style> 

@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
        </div>
    </div>
            <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

              <div id="accordion-one" class="accordion">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa" aria-hidden="true"></i> Filter per tanggal</h5>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion-one" style="">
              {{form_open("","id='form-filter'")}}
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                      <input type="text" id="start" name="start_date" class="filter form-control datetimepicker-input" data-target="#datetimepicker2" placeholder="Tanggal mulai" />
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                      <input type="text" id="end" name="end_date" class="filter form-control datetimepicker-input" data-target="#datetimepicker2" placeholder="Tanggal akhir"/>
                    </div>
                  </div>
                  

                  <div class="col-2">
                  <div class="form-group">
                    {{form_submit("submit","Filter","class='btn btn-primary input-group'")}}              
                  </div>
                  </div>
                  <div class="col-2">
                  <div class="form-group"> 
                    {{form_submit("submit","Reset","class='btn btn-secondary input-group'")}}             
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
                        <br/>
                        <button class="btn btn-success" onclick="add_laporan()"><i class="glyphicon glyphicon-plus"></i> Tambah Laporan</button>
                        <br />
                        <br />
                        <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size: 13px; width: 100%;">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>OPD</th>
                              <th>Tanggal</th>
                              <th>Judul</th>
                              <th>Bidang</th>
                              <th>Isi</th>
                              <th>Tindakan</th>
                              <th>Ket</th>
                              <th>File</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
 @endsection
<script src="{{APP_ASSETS}}plugins/jquery/jquery.min.js"></script>
 
 
<script type="text/javascript">
 
var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';
 
$(document).ready(function() {
    $('#start').on('keyup', function() {
      dataTable
        .columns(2)
        .search(this.value)
        .draw();
      });$('#end').on('keyup', function() {
      dataTable
        .columns(2)
        .search(this.value)
        .draw();
      });

      $('#form-filter').submit('click', function() {
      $.ajax({
        url: "<?php echo site_url('userpage/filter_tanggal'); ?>",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(data) {
          $('#start').val("");
          $('#end').val("");
          swal(
            'Sedang memfilter..',
            'Tunggu sebentar..',
            'info'
          );
          table.ajax.reload();
        }
      });
      return false;
    });



    //datatables
    table = $('#table').DataTable({ 
        "bInfo" : false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        dom: 'Bfrtlp',
        buttons: [ 
            {
                extend: 'excelHtml5',
                className: 'btn btn-success btn-lg',
                title: 'Laporan',
                exportOptions: {
                    columns: [ 0, 1, 2, 4, 5, 6, 7 ]
                }
            },
            {
                extend: 'pdfHtml5',
                className: 'btn btn-danger btn-lg',
                title: 'Laporan',
                orientation: 'landscape',
                pageSize: 'FOLIO',
                exportOptions: {
                    columns: [ 0, 1, 2, 4, 5, 6, 7 ]
                },
                customize: function ( doc ) {
                // ket = table.column(7).data().toArray();
                //   for (var i = 0; i < ket.length; i++) {
                //     if (ket[i] = 'Belum Selesai') {
                //       doc.content[1].table.body[i+1][7].fillColor = 'red';
                //     }
                //   };

                doc.pageMargins = [60, 75, 60, 60];

                doc.content[1].table.widths =
                    Array(doc.content[1].table.body[0].length + 1).join('*').split('');
             
                doc.content[1].table.body[0].forEach(function (h) {
                    h.fillColor = 'blue'
                });
                doc.content[1].table.widths = [
                '3%',
                '15%',
                '10%',
                '12%',
                '30%',
                '20%',
                '10%',
                ]
                }

            },
            {
                extend: 'colvis',
                text: 'Show/Hide Columns',
                className: 'btn btn-danger btn-lg',
                columnText: function ( dt, idx, title ) {
                    return (idx+1)+': '+title;
                }
            } ],
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('userpage/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],
 
    });
 ;
 
    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
 
});
 
 
 
function add_laporan()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Laporan'); // Set Title to Bootstrap modal title
 
    $('#file-preview').hide(); // hide file preview modal
 
    $('#label-file').text('Upload file'); // label file upload
}
 
function edit_laporan(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('userpage/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_laporan"]').val(data.id_laporan);
            $('[name="id_opd"]').val(data.id_opd);
            $('[name="tanggal"]').val(data.tanggal);
            $('[name="judul"]').val(data.judul);
            $('[name="nama_bidang"]').val(data.nama_bidang);
            $('[name="isi_laporan"]').val(data.isi_laporan);
            $('[name="tindakan"]').val(data.tindakan);
            $('[name="keterangan"]').val(data.keterangan);
            // $('[name="file"]').val(data.file);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Laporan'); // Set title to Bootstrap modal title
 
            $('#file-preview').show(); // show file preview modal
 
            if(data.file)
            {
                $('#label-file').text('Change file'); // label file upload
                $('#file-preview div').html('<img src="'+base_url+'upload/'+data.file+'" class="img-responsive">'); // show file
                $('#file-preview div').append('<input type="checkbox" name="file" value="'+data.file+'"/> Remove file when saving'); // remove file
 
            }
            else
            {
                $('#label-file').text('Upload file'); // label file upload
                $('#file-preview div').text('(No file)');
            }
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
 
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('userpage/ajax_add')?>";
    } else {
        url = "<?php echo site_url('userpage/ajax_update')?>";
    }
 
    // ajax adding data to database
 
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            swal(
                  'Good job!',
                  'Success!',
                  'success'
                );
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}
 
function delete_laporan(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('userpage/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                swal(
                  'Good job!',
                  'Data telah dihapus!',
                  'success'
                );
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
}

$(document).on("click", ".open", function() {
        $('#modal-lihat').modal('show');
        var namaFile = $(this).data('id');
        var judulFile = $(this).data('judul');
        var data = "{{site_url('upload/'.'" + namaFile + "'.'')}}";
        $("#judul-file").html(judulFile);
        $(".modal-body #nama-file").attr("src", data);
    });


 
</script>
 
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Laporan Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">

                          <div class="row">
                            <div class="col-6">
                              <input type="text" class="form-control input-flat" id="id_laporan" name="id_laporan" hidden>
                              <label>OPD / Kecamatan</label>
                              <select class="form-control" id="id_opd" name="id_opd">
                              <?php foreach ($opd as $opd) { ?>
                                <?php if ($opd->id_opd == $this->session->userdata('id_opd')) { ?>
                                  <option value="<?=$opd->id_opd?>"><?=$opd->nama_opd?></option>
                                  <?php } ?>
                              <?php } ?>
                              </select>
                            </div>
                            <div class="col-6">
                              <label>Tanggal & Waktu</label>
                              <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                  <input type="text" id="tanggal" name="tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                                  <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <label>Judul</label>
                            <input type="text" class="form-control input-flat" id="judul" name="judul" placeholder="Judul">
                          </div>
                          <div class="col-6">
                            <label>Bidang Situasi</label>
                            <select class="form-control" id="nama_bidang" name="nama_bidang">
                            <?php foreach ($bidang as $bidang) { ?>
                                <option value="<?=$bidang->nama_bidang?>"><?=$bidang->nama_bidang?></option>
                            <?php } ?>    
                            </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <label>Isi Laporan</label>
                            <textarea rows="6" class="form-control h-150px" rows="6" name="isi_laporan" id="isi_laporan"></textarea>
                          </div>
                          <div class="col-6">
                            <label>Tindakan yang dilakukan</label>
                            <textarea rows="6" class="form-control h-150px" rows="6" name="tindakan" id="tindakan"></textarea>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <label>Keterangan</label>
                            <select class="form-control" name="keterangan" id="keterangan">
                                <option value="Selesai">Selesai</option>
                                <option value="Belum Selesai">Belum Selesai</option>
                            </select>
                          </div>
                          <div class="col-6">
                            <label>Berkas Pendukung</label>
                            <input type="file" class="form-control-file" name="file" id="file">
                            <span id="user_uploaded_image"></span> 
                          </div>
                        </div>

                      </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<div class="modal fade" id="modal_file" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Laporan Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal" id="modal-lihat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header p-2 bg-primary">
              <h6 class="modal-title"><span class="fa fa-eye"></span> Lihat File</h6>
                <button id="reload-file" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                
                <label id="judul-file" class="font-bold"></label>
            </div>
            <div class="modal-body">
                <embed id="nama-file" width="100%" height="460" type="application/pdf"></embed> 
            </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
        </div>
        </div>
    </div>
</div>
