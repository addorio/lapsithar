<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Bidang Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                      <div class="form-group">
                        <label>Nama Bidang</label>
                        <input type="text" class="form-control input-flat" id="id_bidang" name="id_bidang" placeholder="Nama OPD / Kecamatan" required="" hidden>
                        <input type="text" class="form-control input-flat" id="nama_bidang" name="nama_bidang" placeholder="Nama Bidang" required="">
                        <span name="nama_bidang" style="color: red;"></span>
                      </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn mb-1 btn-flat btn-outline-primary">Simpan</button>
                <button type="button" class="btn mb-1 btn-flat btn-outline-danger" data-dismiss="modal">Batal</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->