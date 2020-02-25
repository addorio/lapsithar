@extends('base.main_base')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar User<span><button class="btn mb-1 btn-flat btn-outline-primary" style="float: right;" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah User</button></span></h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered display nowrap responsive" id="user_data" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>OPD</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th class="text-center">Aksi</th>
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
<!-- #/ container -->


@include('admin.usermanagement.modal')
@endsection
@section('js')

<script type="text/javascript">
    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#user_data').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "responsive": true,
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('user/ajax_list') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [-1,0], //last column
                "orderable": false, //set not orderable
            }, ],

        });

    });

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



    function add_person() {
        save_method = 'add';
        $('#user_form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#userModal').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah User'); // Set Title to Bootstrap modal title
    }

    function edit_person(id) {
        save_method = 'update';
        $('#edit_form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('user/ajax_edit/') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="id_user"]').val(data.id_user);
                $('[name="id_opd"]').val(data.id_opd);
                $('[name="nama"]').val(data.nama);
                $('[name="username"]').val(data.username);
                $('[name="password"]').val(data.password);
                $('[name="id_level"]').val(data.id_level);
                $('#editModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
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
            url = "<?php echo site_url('user/ajax_add') ?>";

            $.ajax({
                url: url,
                type: "POST",
                data: $('#user_form').serialize(),
                dataType: "JSON",
                success: function(data) {

                    if (data.status) //if success close modal and reload ajax table
                    {
                        swal(
                            'Berhasil!',
                            'Data berhasil ditambahkan',
                            'success'
                        );
                        $('#userModal').modal('hide');
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
                    alert('Error adding / update data');
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 

                }
            });
        } else {
            url = "<?php echo site_url('user/ajax_update') ?>";

            $.ajax({
                url: url,
                type: "POST",
                data: $('#edit_form').serialize(),
                dataType: "JSON",
                success: function(data) {

                    if (data.status) //if success close modal and reload ajax table
                    {
                        swal(
                            'Berhasil!',
                            'Data diperbaharui',
                            'success'
                        );
                        $('#editModal').modal('hide');
                        reload_table();
                    } else {
                        swal(
                            'error',
                            'Form tidak boleh kosong',
                            'Something went wrong!',
                            '<a href>Why do I have this issue?</a>'
                        );
                        for (var i = 0; i < data.inputerror.length; i++) {
                            $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }

                    }

                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 

                }
            });
        }
    }
function delete_person(id)
{
    // if(confirm('Are you sure delete this data?'))
    // {
    //     // ajax delete data to database
    //     $.ajax({
    //         url : "<?php echo site_url('user/ajax_delete')?>/"+id,
    //         type: "POST",
    //         dataType: "JSON",
    //         success: function(data)
    //         {
    //             //if success reload ajax table
    //             swal(
    //                         'Berhasil!',
    //                         'Data telah dihapus',
    //                         'success'
    //                       );
    //             $('#userModal').modal('hide');
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
            url: "<?php echo site_url('user/ajax_delete') ?>/" + id,
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
