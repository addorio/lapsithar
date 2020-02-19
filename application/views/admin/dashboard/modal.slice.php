<!-- Bootstrap modal -->
<div class="modal" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content animated fadeInDown">
            <div class="modal-header  p-2">
                <h3 class="modal-title">Laporan Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
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
                              <div class="form-group date" id="datetimepicker2" data-target-input="nearest">
                                  <input type="text" id="tanggal" name="tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                                  <div style="color: red;"></div>
                              </div>
                            </div>
                        </div> <br>

                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control input-flat" id="judul" name="judul" placeholder="Judul" required />
                            <div style="color: red;"></div>
                            </div>
                          </div>
                          <div class="col-6">
                            <label>Bidang Situasi</label>
                            <select class="form-control" id="nama_bidang" name="nama_bidang">
                            <?php foreach ($bidang as $bidang) { ?>
                                <option value="<?=$bidang->nama_bidang?>"><?=$bidang->nama_bidang?></option>
                            <?php } ?>    
                            </select>
                          </div>
                        </div> <br>

                        <div class="row">
                          <div class="col-6">
                            <label>Isi Laporan</label>
                            <textarea rows="6" class="form-control h-150px summernote" rows="6" name="isi_laporan" id="isi_laporan" required /></textarea>
                            <span name="laporan_error" style="color: red;"></span>
                            <div style="color: red;"></div>
                          </div>
                          <div class="col-6">
                            <label>Tindakan yang dilakukan</label>
                            <textarea rows="6" class="form-control h-150px summernote" rows="6" name="tindakan" id="tindakan"></textarea>
                            <span name="tindakan_error" style="color: red;"></span>
                            <div style="color: red;"></div>
                          </div>
                        </div> <br>

                        <div class="row">
                          <div class="col-6">
                            <label>Keterangan</label>
                            <select class="form-control" name="keterangan" id="keterangan">
                                <option value="Selesai">Selesai</option>
                                <option value="Belum Selesai">Belum Selesai</option>
                            </select>
                          </div>
                          <div class="col-6">
                            <label>Berkas Pendukung ( .jpg | .png | .pdf| ) maks 1 MB</label>
                            <input type="file" class="form-control-file" name="file" id="file">
                            <div style="color: red;"></div>
                            <span id="user_uploaded_image"></span>  
                          </div>
                        </div>

                      </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn mb-1 btn-flat btn-outline-primary">Save</button>
                <button type="button" class="btn mb-1 btn-flat btn-outline-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<div class="modal" id="modal-lihat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title"><span class="fa fa-eye"></span> Lihat File</h6>
                <button id="reload-file" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                
                <label id="judul-file" class="font-bold"></label>
            </div>
            <div class="modal-body">
                <embed id="nama-file" width="100%" height="460" type="application/pdf" ></embed> 
            </div>
        <div class="modal-footer">
        <button type="button" class="btn mb-1 btn-flat btn-outline-dark" data-dismiss="modal">Tutup</button>
        </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_lihatlaporan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title"><span class="fa fa-eye"></span> Lihat File</h6>
                <button id="reload-file" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> 
                <label id="judul-file" class="font-bold"></label>
            </div>
            <div class="modal-body">
              <div class="col-12">

                <div class="form-group row">
                    <label class="col-sm-2 control-label" style="font-size: 14.5px;">ID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="id_laporan" name="id_laporan" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label" style="font-size: 14.5px;">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tanggal" name="tanggal"  readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label" style="font-size: 14.5px;">Judul</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="judul" name="judul"  readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label" style="font-size: 14.5px;">Bidang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"  readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label" style="font-size: 14.5px;">Isi</label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="isi_laporan" name="isi_laporan" readonly></textarea> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label" style="font-size: 14.5px;">Tindakan</label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="tindakan" name="tindakan" readonly></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label" style="font-size: 14.5px;">Keterangan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="keterangan" name="keterangan" readonly>
                    </div>
                </div>
              

              </div>
                
            </div>
        <div class="modal-footer">
        <button type="button" class="btn mb-1 btn-flat btn-outline-dark" data-dismiss="modal">Tutup</button>
        </div>
        </div>
    </div>
</div>