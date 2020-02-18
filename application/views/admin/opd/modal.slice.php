<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">OPD Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                      <div class="form-group">
                        <label>Nama OPD</label>
                        <input type="text" class="form-control input-flat" id="id_opd" name="id_opd" placeholder="Nama OPD / Kecamatan" required="" hidden>
                        <input type="text" class="form-control input-flat" id="nama_opd" name="nama_opd" placeholder="Nama OPD / Kecamatan" required="">
                        <span name="nama_opd" style="color: red;"></span>
                      </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn mb-1 btn-flat btn-outline-primary">save</button>
                <button type="button" class="btn mb-1 btn-flat btn-outline-danger" data-dismiss="modal">cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->