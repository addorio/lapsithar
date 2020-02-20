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

            <!-- row -->
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div id="judullaporan" style="color: red;">
                <?php echo $this->session->userdata('nama_opd');?>
            </div>

        <div id="accordion-one" class="accordion">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa" aria-hidden="true"></i> Filter per tanggal</h5>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion-one" style="">
              {{form_open("","id='form-filter'")}}
              <div class="card-body">

                <div class="row">
                  <div class="col-3">
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                      <input type="text" id="start" name="start_date" class="filter form-control datetimepicker-input" data-target="#datetimepicker2" autocomplete="off" placeholder="Dari tanggal" />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                      <input type="text" id="end" name="end_date" class="filter form-control datetimepicker-input" data-target="#datetimepicker2" autocomplete="off" placeholder="Hingga tanggal"/>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group" id="datetimepicker2" data-target-input="nearest">
                      <select>
                        <option value="Selesai">Selesai</option>
                        <option value="Belum">Belum Selesai</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                  <div class="form-group">
                    {{form_submit("submit","Filter","class='btn mb-1 btn-flat btn-outline-primary input-group'")}}              
                  </div>
                  </div>
                  <div class="col-2">
                  <div class="form-group"> 
                    {{form_submit("submit","Reset","class='btn mb-1 btn-flat btn-outline-secondary input-group'")}}             
                  </div>
                  </div>
                </div>
              </div>
              {{form_close()}}

              {{form_open("","id='ket-filter'")}}
              <div class="card-body">
                <div class="row">
                  
                </div>
              </div>
              {{form_close()}}
            </div>
          </div>
        </div>

        <div id="accordion-one" class="accordion">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa" aria-hidden="true"></i> Filter per tanggal</h5>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion-one" style="">
              
            </div>
          </div>
        </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rekapitulasi Laporan<span><button class="btn mb-1 btn-flat btn-outline-primary" style="float: right;" onclick="add_laporan()"><i class="glyphicon glyphicon-plus"></i>Tambah Laporan</button></span></h5>
                        
                        <br />
                        <br />
                        <div class="table-responsive">
                        <table id="table" class="table table-bordered" cellspacing="0" width="100%" style="font-size: 11px; width: 100%;" data-export-title="<?= $this->session->userdata('nama_opd') ?>">
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
                              <th>Nama</th>
                              <th>File</th>
                              <th>Detail</th>
                              <th>Ubah</th>
                              <th>Hapus</th>
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
@include('user.modal')
 @endsection
<script src="{{APP_ASSETS}}plugins/jquery/jquery.min.js"></script>
 
 
<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';
var user  = '<?= $user->nama_opd ?>';
 

$(document).ready(function() {
    $('.summernote').summernote({
    height: 150,
    toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
    ],
    tooltip: false
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
          $('#ket').val("");
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

      $('#ket-filter').submit('click', function() {
      $.ajax({
        url: "<?php echo site_url('userpage/filter_ket'); ?>",
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
        dom: 'frBtlp',
        buttons: [ 
            {
                extend: 'excelHtml5',
                className: 'btn mb-1 btn-flat btn-outline-success',
                title: user,
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                }
            },
            {
                extend: 'pdfHtml5',
                className: 'btn mb-1 btn-flat btn-outline-danger',
                title: user,
                orientation: 'landscape',
                pageSize: 'FOLIO',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
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
                '25%',
                '20%',
                '10%',
                '5%',
                ]
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
            $('[name="isi_laporan"]').summernote('code', data.isi_laporan);
            $('[name="tindakan"]').summernote('code',data.tindakan);
            $('[name="keterangan"]').val(data.keterangan);
            $('[name="nama"]').val(data.nama);
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

function lihat_laporan(id)
{          
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
            var isi = $(data.isi_laporan).text();
            $('[name="isi_laporan"]').val(isi);
            var tind = $(data.tindakan).text();
            $('[name="tindakan"]').val(tind);
            $('[name="keterangan"]').val(data.keterangan);
            $('[name="nama"]').val(data.nama);
            // $('[name="file"]').val(data.file);
            $('#modal_lihatlaporan').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Laporan'); // Set title to Bootstrap modal title
 
 
 
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
                swal(
                  'Good job!',
                  'Berhasil',
                  'success'
                );
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
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('File tidak boleh kosong');
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