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
                            <select class="form-control" name="id_opd">
                            <?php foreach ($opd as $opd) { ?>
                                <option value="<?=$opd->id_opd?>"><?=$opd->nama_opd?></option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="col-6">
                            <label>Nama</label>
                            <input type="text" class="form-control input-flat" name="nama" placeholder="Nama">
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-6">
                            <label>Username</label>
                            <input type="text" class="form-control input-flat" name="username" placeholder="Username">
                          </div>
                          <div class="col-6">
                            <label>Password</label>
                            <input type="password" class="form-control input-flat" name="password" placeholder="Password">
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-6">
                            <label>Level</label>
                            <select class="form-control" name="id_level">
                            <?php foreach ($level as $lvl) { ?>
                                <option value="<?=$lvl->id_level?>"><?=$lvl->nama_level?></option>
                            <?php } ?>
                            </select>
                          </div>
                        </div>

                      </div> 
                     </div>  
                     <div class="modal-footer">  
                          <button type="button" id="btnSave" onclick="save()" class="btn mb-1 btn-flat btn-outline-primary">Save</button>
                          <button type="button" class="btn mb-1 btn-flat btn-outline-danger" data-dismiss="modal">Cancel</button>
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>

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
                            <label>OPD / Kecamatan</label>
                            <select class="form-control" name="id_opd">
                            <?php foreach ($op as $op) { ?>
                                <option value="<?=$op->id_opd?>"><?=$op->nama_opd?></option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="col-6">
                            <label>Nama</label>
                            <input type="text" class="form-control input-flat" name="nama" placeholder="Nama">
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-6">
                            <label>Username</label>
                            <input type="text" class="form-control input-flat" name="username" placeholder="Username">
                          </div>
                          <div class="col-6">
                            <label>Password</label>
                            <input type="password" class="form-control input-flat" name="password" placeholder="Password" readonly="">
                          </div>
                        </div>

                        <br>

                        <div class="row">
                          <div class="col-6">
                            <label>Level</label>
                            <select class="form-control" name="id_level">
                            <?php foreach ($level as $lvl) { ?>
                                <option value="<?=$lvl->id_level?>"><?=$lvl->nama_level?></option>
                            <?php } ?>
                            </select>
                          </div>
                        </div>

                      </div> 
                     </div>  
                     <div class="modal-footer">  
<!--                           <input type="hidden" name="id_user" id="id_user" class="btn btn-success" value="Add" />
                          <input type="hidden" name="action" class="btn btn-success" value="Add" />                          
                          <input type="submit" name="action" class="btn btn-success" value="Add" />
                          <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button> -->
                          <button type="button" id="btnSave" onclick="save()" class="btn mb-1 btn-flat btn-outline-primary">Simpan</button>
                          <button type="button" class="btn mb-1 btn-flat btn-outline-danger" data-dismiss="modal">Batal</button>
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>