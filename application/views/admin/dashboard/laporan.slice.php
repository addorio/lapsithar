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

              <div id="accordion-one" class="accordion">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa" aria-hidden="true"></i> Filter by date</h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion-one" style="">
                                          <div class="card-body">
                                            <div class="row">
                                              <div class="col-6">
                                                <label>Start</label>
                                                  <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                                      <input type="text" id="start" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                                                  </div>
                                              </div>
                                              <div class="col-6">
                                                <label>End</label>
                                                  <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                                      <input type="text" id="end" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                                                  </div>
                                              </div>
                                            

                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Rekapitulasi Laporan<span><button style="float: right;" type="button" id="add_button" data-toggle="modal" data-target="#laporanModal" class="btn btn-info btn-lg">+</button></span></h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="font-size: 13px; width: 100%;" id="laporan_data">
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
                                        <!-- <th>File</th> -->
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
 <div id="laporanModal" class="modal fade">  
      <div class="modal-dialog modal-lg" style="width: 90%;">  
           <form method="post" id="laporan_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>   
                     </div>  
                     <div class="modal-body">
                      

                      <div class="form-group">

                        <div class="row">
                          <div class="col-6">
                            <input type="text" class="form-control input-flat" id="id_laporan" name="id_laporan" hidden>
                            <label>OPD / Kecamatan</label>
                            <select class="form-control" id="id_opd" name="id_opd">
                            <?php foreach ($opd as $opd) { ?>
                                <option value="<?=$opd->id_opd?>"><?=$opd->nama_opd?></option>
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
                     <div class="modal-footer">  
                          <!-- <input type="hidden" name="id_laporan" id="id_laporan" class="btn btn-success" value="Add" /> -->
                          <input type="hidden" name="action" id="action" class="btn btn-success" value="Add" />
                          <input type="submit" name="action" id="action" class="btn btn-success" value="Save" />
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
      $('#start').on( 'keyup', function () {
        dataTable
        .columns( 2 )
        .search( this.value )
        .draw();
      });
      $('#end').on( 'keyup', function () {
        dataTable
        .columns( 2 )
        .search( this.value )
        .draw();
      });

      $('#add_button').click(function(){  
           $('#laporan_form')[0].reset();  
           $('.modal-title').text("Add User");  
           $('#action').val("Add");  
           $('#user_uploaded_image').html('');  
      })  
      var dataTable = $('#laporan_data').DataTable({  
           "processing":true,  
           "serverSide":true,
           dom: 'Bfrtip',
            // buttons: [
            //     'excel', 'pdf'
            // ],
            buttons: [ 
            {
                extend: 'excelHtml5',
                className: 'btn btn-success btn-lg',
                exportOptions: {
                    columns: [ 0, 1, 2, 4, 5, 6, 7 ]
                }
            },
            {
                extend: 'pdfHtml5',
                className: 'btn btn-danger btn-lg',
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
           var id_opd = $('#id_opd').val();  
           var tanggal = $('#tanggal').val();
           var judul = $('#judul').val();  
           var nama_bidang = $('#nama_bidang').val(); 
           var isi_laporan = $('#isi_laporan').val();  
           var tindakan = $('#tindakan').val(); 
           var keterangan = $('#keterangan').val();     
           var extension = $('#file').val().split('.').pop().toLowerCase(); 
           if(extension != '')  
           {  
                if(jQuery.inArray(extension, ['pdf','jpg','png']) == -1)  
                {  
                     swal({icon: 'error',
                      title: 'Oops...',
                      text: 'Invalid File type!',
                      footer: 'Only .pdf .jpg and .png file accepted'});  
                     $('#file').val('');  
                     return false;  
                }  
           }       
           if(id_opd != '' && tanggal != '' && judul != '' && nama_bidang != '' && isi_laporan != '' && tindakan != '' && keterangan != '' && extension != '')  
           {  
                $.ajax({  
                     url:"<?php echo site_url('Dashboard/user_action')?>",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          swal(
                            'Good job!',
                            'Success',
                            'success'
                          );   
                          $('#laporan_form')[0].reset();  
                          $('#laporanModal').modal('hide');  
                          $('#laporan_data').DataTable().ajax.reload();  
                     }  
                });  
           }  
           else  
           {  
                swal({icon: 'error',
  title: 'Oops...',
  text: 'All fields are required!'}); 
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
                     $('#id_laporan').val(id_laporan); 
                     $('#id_opd').val(data.id_opd);  
                     $('#tanggal').val(data.tanggal);
                     $('#judul').val(data.judul); 
                     $('#nama_bidang').val(data.nama_bidang); 
                     $('#isi_laporan').val(data.isi_laporan); 
                     $('#tindakan').val(data.tindakan);
                     $('#keterangan').val(data.keterangan); 
                     $('#file').val(data.file);    
                     $('.modal-title').text("Edit User");    
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
                          swal(
                            'Good job!',
                            'Success',
                            'success'
                          );   
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

