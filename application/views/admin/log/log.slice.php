@extends('base.main_base')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Aktivitas<span></span></h5>
                        
                        <div class="table-responsive">
                            <table id="table" class="table table-striped display nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th class="text-center">Aktivitas Log</th>
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
 @section('js')

 
<script type="text/javascript">
    $(document).ready(function() {
    table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('riwayat/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ 0 ], //last column
                "orderable": false, //set not orderable
            },
        ],
 
    });
});
</script>
@endsection
