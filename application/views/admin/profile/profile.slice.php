@extends('base.main_base')
<!-- <link href="{{APP_ASSETS}}plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet"> -->

<!-- <style>
    .datetimepicker {
     z-index:10800 !important;
  display: block;
    }
</style> -->

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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped zero-configuration" style="font-size: 13px; width: 100%;" id="user">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama OPD</th>
                                    <th>Nama Admin</th>
                                    <th>Username</th>
                                    <th align="justify">Edit</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
    <!-- #/ container -->

 <div id="editModal" class="modal fade">  
      <div class="modal-dialog modal-lg" style="width: 90%;">  
           <form method="post" id="edit_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>   
                     </div>  
                     <div class="modal-body">
                      

                      <div class="form-group">
                        <input type="text" class="form-control input-flat" name="id_user" placeholder="Nama" hidden>
                        <div class="row">
                          <div class="col-6">
                            
                            <input type="text" class="form-control input-flat" name="id_opd" placeholder="NAMA" readonly="" hidden>
                          </div>
                          <div class="col-12">
                            <label>Nama</label>
                            <input type="text" class="form-control input-flat" name="nama" placeholder="Nama">
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-12">
                            <label>Username</label>
                            <input type="text" class="form-control input-flat" name="username" placeholder="Username">
                          </div>
                          <div class="col-12">
                            <label>Password</label>
                            <input type="password" class="form-control input-flat" name="password" placeholder="Password">
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-6">
                            <input type="text" class="form-control input-flat" name="id_level" value="" hidden>
                          </div>
                        </div>

                      </div> 
                     </div>  
                     <div class="modal-footer">  
<!--                           <input type="hidden" name="id_user" id="id_user" class="btn btn-success" value="Add" />
                          <input type="hidden" name="action" class="btn btn-success" value="Add" />                          
                          <input type="submit" name="action" class="btn btn-success" value="Add" />
                          <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button> -->
                          <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>
@endsection
<script src="{{APP_ASSETS}}plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#user').DataTable({ 
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "processing": false, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('profile/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [0,1,2,3,4], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

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
        url : "<?php echo site_url('profile/ajax_edit/')?>/" + id,
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
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('profile/ajax_add')?>";

        $.ajax({
        url : url,
        type: "POST",
        data: $('#user_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
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
        url = "<?php echo site_url('profile/ajax_update')?>";

        $.ajax({
        url : url,
        type: "POST",
        data: $('#edit_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
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
            swal(
                  'Good job!',
                  'Data Updated!',
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
}

function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('profile/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                swal(
                            'Good job!',
                            'Success',
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

