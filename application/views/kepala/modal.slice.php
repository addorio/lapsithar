<div class="modal" id="modal_lihatlaporan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><span class="fa fa-eye"></span> Detail Laporan</h4>
        <button id="reload-file" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-hover table-sm">
          <tr>
            <td width="20%"><strong>OPD</strong></td>
            <td width="1%">:</td>
            <td><span id="lihat-nama-opd"></span></td>
          <tr>
            <td><strong>Tanggal</strong></td>
            <td width="1%">:</td>
            <td><span id="lihat-tanggal"></span></td>
          </tr>
          <tr>
            <td><strong>Judul</strong></td>
            <td width="1%">:</td>
            <td><span id="lihat-judul"></span></td>
          </tr>
          <tr>
            <td><strong>Bidang</strong></td>
            <td width="1%">:</td>
            <td><span id="lihat-nama-bidang"></span></td>
          </tr>
          <tr>
            <td valign="top"><strong>Isi Laporan</strong></td>
            <td valign="top" width="1%">:</td>
            <td><span id="lihat-isi-laporan"></span></td>
          </tr>
          <tr>
            <td valign="top"><strong>Tindakan Laporan</strong></td>
            <td valign="top" width="1%">:</td>
            <td><span id="lihat-tindakan-laporan"></span></td>
          </tr>
          <tr>
            <td><strong>Keterangan</strong></td>
            <td width="1%">:</td>
            <td><span id="lihat-keterangan"></span></td>
          </tr>
          <tr>
            <td><strong>Nama Pelapor </strong></td>
            <td width="1%">:</td>
            <td><span id="lihat-pelapor"></span></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp; &nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><strong>LAMPIRAN</strong></td>
          </tr>
          <tr>
            <td colspan="3"><embed id="nama-file-detail" width="100%" height="460" type="application/pdf"></embed></td>
          </tr>

        </table>
        <!-- <div class="form-group row">
                    <embed id="nama-file" width="100%" height="460" type="application/pdf" name="file" src="<?php site_url() ?>"></embed> 
                </div> -->
        <!-- <div class="form-group row">
                <a class="open btn mb-1 btn-flat btn-outline-success btn-sm" data-toggle="modal" name="file">Lihat</a>
                </div> -->


      </div>
      <div class="modal-footer">
        <button type="button" class="btn mb-1 btn-flat btn-dark" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>