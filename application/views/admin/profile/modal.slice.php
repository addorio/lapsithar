<div id="editModal" class="modal">  
      <div class="modal-dialog modal-lg modal-dialog-centered">  
           <form method="post" id="edit_form">  
                <div class="modal-content animated fadeInDown">  
                     <div class="modal-header p-2">  
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
                            <span name="nama" style="color: red;"></span> 
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-12">
                            <label>Username</label>
                            <input type="text" class="form-control input-flat" name="username" placeholder="Username">
                            <span name="username" style="color: red;"></span>
                          </div>
                          <div class="col-12">
                            <label>Password</label>
                            <input type="password" class="form-control input-flat" name="password" placeholder="Password">
                            <span name="password" style="color: red;"></span>
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
                          <button type="button" id="btnSave" onclick="save()" class="btn mb-1 btn-flat btn-outline-primary">Simpan</button>
                          <button type="button" class="btn mb-1 btn-flat btn-outline-danger" data-dismiss="modal">Batal</button>
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>