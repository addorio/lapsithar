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
            <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Rekapitulasi Laporan<span><button style="float: right;" type="button" id="add_button" data-toggle="modal" data-target="#laporanModal" class="btn btn-info btn-lg">+</button></span></h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="font-size: 13px; width: 100%;" id="laporan_data">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>OPD</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
    <!-- #/ container -->

    <!-- Modal -->
 <div id="userModal" class="modal fade">  
      <div class="modal-dialog modal-lg" style="width: 90%;">  
           <form method="post" id="user_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>   
                     </div>  
                     <div class="modal-body">
                      

                      <div class="form-group">

                        <div class="row">
                          <div class="col-6">
                            <label>OPD / Kecamatan</label>
                            <select class="form-control" id="nama_opd" name="nama_opd">
                            <?php foreach ($opd as $opd) { ?>
                                <option value="<?=$opd->id_opd?>"><?=$opd->nama_opd?></option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="col-6">
                            <label>Nama</label>
                            <input type="text" class="form-control input-flat" id="nama" name="nama" placeholder="Nama">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <label>Username</label>
                            <input type="text" class="form-control input-flat" id="judul" name="judul" placeholder="Judul">
                          </div>
                          <div class="col-6">
                            <div class="col-6">
                            <label>Level</label>
                            <input type="text" class="form-control input-flat" id="judul" name="judul" placeholder="Judul">
                          </div>
                          </div>
                        </div>

                      </div> 
                     </div>  
                     <div class="modal-footer">  
                          <input type="hidden" name="id_laporan" id="id_laporan" class="btn btn-success" value="Add" />
                          <input type="hidden" name="action" class="btn btn-success" value="Add" />                          
                          <input type="submit" name="action" class="btn btn-success" value="Add" />
                          <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>  
@endsection
<script src="{{APP_ASSETS}}plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){  
      $('#add_button').click(function(){  
           $('#laporan_form')[0].reset();  
           $('.modal-title').text("Add User");  
           $('#action').val("Add");  
           $('#user_uploaded_image').html('');  
      })  
      var dataTable = $('#laporan_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo site_url('Dashboard/fetch_laporan') ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[8, 9],  
                     "orderable":false,  
                },
           ],
      });  
      $(document).on('submit', '#laporan_form', function(event){  
           event.preventDefault();  
           var nama_opd = $('#nama_opd').val();  
           var tanggal = $('#tanggal').val();
           var judul = $('#judul').val();  
           var nama_bidang = $('#nama_bidang').val(); 
           var isi_laporan = $('#isi_laporan').val();  
           var tindakan = $('#tindakan').val(); 
           var keterangan = $('#keterangan').val();     
           var extension = $('#file').val().split('.').pop().toLowerCase();  
           if(extension != '')  
           {  
                if(jQuery.inArray(extension, ['pdf']) == -1)  
                {  
                     alert("Invalid Image File");  
                     $('#file').val('');  
                     return false;  
                }  
           }       
           if(nama_opd != '' && tanggal != '' && judul != '' && nama_bidang != '' && isi_laporan != '' && tindakan != '' && keterangan != '' && extension != '')  
           {  
                $.ajax({  
                     url:"<?php echo site_url('Dashboard/user_action')?>",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          alert(data);  
                          $('#laporan_form')[0].reset();  
                          $('#laporanModal').modal('hide');  
                          $('#laporan_data').DataTable().ajax.reload();  
                     }  
                });  
           }  
           else  
           {  
                alert("Bother Fields are Required");  
           }  
      });  
      $(document).on('click', '.update', function(){  
           var id_laporan = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo site_url('Dashboard/fetch_single_laporan') ?>",  
                method:"POST",  
                data:{id_laporan:id_laporan},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#action').val("Edit");
                     $('#laporanModal').modal('show'); 
                     $('#nama_opd').val(data.nama_opd);  
                     $('#tanggal').val(data.tanggal);
                     $('#judul').val(data.judul); 
                     $('#nama_bidang').val(data.nama_bidang); 
                     $('#isi_laporan').val(data.isi_laporan); 
                     $('#tindakan').val(data.tindakan);
                     $('#keterangan').val(data.keterangan); 
                     $('#file').val(data.file);    
                     $('.modal-title').text("Edit User");  
                     $('#id_laporan').val(id_laporan);  
                     $('#user_uploaded_image').html(data.file);  
                       
                }  
           })  
      });  
      $(document).on('click', '.delete', function(){  
           var id_laporan = $(this).attr("id");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"<?php echo site_url('Dashboard/delete_single_laporan'); ?>",  
                     method:"POST",  
                     data:{id_laporan:id_laporan},  
                     success:function(data)  
                     {  
                          alert(data);  
                          dataTable.ajax.reload();  
                     }  
                });  
           }  
           else  
           {  
                return false;       
           }  
      });  
 });  
</script>

