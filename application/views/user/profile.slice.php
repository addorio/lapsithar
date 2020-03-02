@extends('base.user_base')
@section('content')
<div class="content-body">
            <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- <table class="table zero-configuration" style="font-size: 13px; width: 100%;" id="user"> -->
                            <table class="table" style="width: 100%;">
                            <!-- <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama OPD</th>
                                    <th>Nama Admin</th>
                                    <th>Username</th>
                                    <th align="justify"></th>
                                </tr>
                            </thead> -->
                            <thead>
                                <tr>
                                    <td style="width: 15%;">ID</td>
                                    <td style="width: 2%;">:</td>
                                    <td><?=$user->id_user?></td>
                                </tr>
                                <tr>
                                    <td>Nama OPD</td>
                                    <td>:</td>
                                    <td><?=$user->nama_opd?></td>
                                </tr>
                                    <td>Nama Admin</td>
                                    <td>:</td>
                                    <td><?=$user->nama?></td>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td><?=$user->username?></td>
                                </tr>
                            </thead>
                        </table>
                        <a class="btn mb-1 btn-flat btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_person(<?=$user->id_user?>)"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
    <!-- #/ container -->

@include('user.modalprofile')
@endsection
<script src="{{APP_ASSETS}}plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    // table = $('#user').DataTable({ 
    //     "bPaginate": false,
    //     "bLengthChange": false,
    //     "bFilter": false,
    //     "bInfo": false,
    //     "processing": false, //Feature control the processing indicator.
    //     "serverSide": true, //Feature control DataTables' server-side processing mode.
    //     "order": [], //Initial no order.

    //     // Load data for the table's content from an Ajax source
    //     "ajax": {
    //         "url": "<?php echo site_url('userprofile/ajax_list')?>",
    //         "type": "POST"
    //     },

    //     //Set column definition initialisation properties.
    //     "columnDefs": [
    //     { 
    //         "targets": [0,1,2,3,4], //last column
    //         "orderable": false, //set not orderable
    //     },
    //     ],

    // });

});

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


function edit_person(id)
{
    save_method = 'update';
    $('#edit_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('userprofile/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_user"]').val(data.id_user);
            $('[name="id_opd"]').val(data.id_opd);
            $('[name="nama"]').val(data.nama);
            $('[name="username"]').val(data.username);
            $('[name="password"]').val(data.password);
            $('[name="id_level"]').val(data.id_level);
            $('#editModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    //table.ajax.reload(null,false); //reload datatable ajax 
    location.reload(); 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('userprofile/ajax_add')?>";

        $.ajax({
        url : url,
        type: "POST",
        data: $('#user_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                swal(
                  'Berhasil!',
                  'Data berhasil ditambahkan',
                  'success'
                );
                $('#userModal').modal('hide'); 
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
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
    } else {
        url = "<?php echo site_url('userprofile/ajax_update')?>";

        $.ajax({
        url : url,
        type: "POST",
        data: $('#edit_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                // swal(
                //   'Berhasil',
                //   'Data diperbaharui',
                //   'success'
                // );
                $('#editModal').modal('hide');
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
            // alert('Data Updated');
            
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal({icon: 'error',
              title: 'Oops...',
              text: 'Error Adding / Update Data!'});
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
    }
}

function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('userprofile/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                swal(
                            'Berhasil!',
                            'Data Terhapus',
                            'success'
                          ); 
                $('#userModal').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>