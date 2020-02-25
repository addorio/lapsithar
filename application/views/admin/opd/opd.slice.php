@extends('base.main_base')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar OPD<span><button class="btn mb-1 btn-flat btn-outline-primary float-right" onclick="add_laporan()"><i class="glyphicon glyphicon-plus"></i> Tambah OPD</button></span></h5>
                        
                        <div class="table-responsive">
                        <table id="table" class="table table-bordered txt-sm" cellspacing="0">
                          <thead>
                            <tr>
                              <th width="1%">No</th>
                              <th>Nama OPD</th>
                              <th width="1%" class="text-center">Aksi</th>
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

@include('admin.opd.modal')
 @endsection
 @section('js')
 
 
<script type="text/javascript">
 
var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';
 
$(document).ready(function() {
    //datatables
    table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('opd/ajax_list')?>",
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
    $('.modal-title').text('Tambah OPD'); // Set Title to Bootstrap modal title
}
 
function edit_laporan(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('opd/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_opd"]').val(data.id_opd);
            $('[name="nama_opd"]').val(data.nama_opd);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ubah OPD'); // Set title to Bootstrap modal title
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
        url = "<?php echo site_url('opd/ajax_add')?>";
    } else {
        url = "<?php echo site_url('opd/ajax_update')?>";
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
    // if(confirm('Are you sure delete this data?'))
    // {
    //     // ajax delete data to database
    //     $.ajax({
    //         url : "<?php echo site_url('opd/ajax_delete')?>/"+id,
    //         type: "POST",
    //         dataType: "JSON",
    //         success: function(data)
    //         {
    //             swal(
    //               'Berhasil!',
    //               'Data Terhapus!',
    //               'success'
    //             );
    //             $('#modal_form').modal('hide');
    //             reload_table();
    //         },
    //         error: function (jqXHR, textStatus, errorThrown)
    //         {
    //             alert('Error deleting data');
    //         }
    //     });
 
    // }
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
            url: "<?php echo site_url('opd/ajax_delete') ?>/" + id,
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
} 
</script>
@endsection
