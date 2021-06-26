<section>
     <div class="container">
          <div class="row">
               <div class="col-sm-12">
                    <!--panel-->
                    <h2 class="text-center"><i class="fa fa-list fa-fw"></i> Daftar Konfirmasi Pembayaran</h2>

                    <div class="panel panel-default">
                         <div class="panel-heading">
                              <!-- <a href="buat_konfirmasi.php" title="Buat Konfirmasi Baru" class="btn btn-primary">Buat Konfirmasi</a> -->
                         </div>
                         <?php if (validation_errors()) : ?>
                              <div class="alert alert-danger" role="alert">
                                   <?= validation_errors(); ?>
                              </div>
                         <?php endif; ?>
                         <?= $this->session->flashdata('message'); ?>
                         <br>
                         <div class="panel-body">
                              <form action="<?php echo site_url('Pemesanan/konfirmasi_pembayaran'); ?>" method="post" enctype="multipart/form-data" role="form">
                             
                              <input type="hidden" name="id_user" value="<?= $user['id']; ?>" />
                                   
                                   <div class="form-group row">
                                        <label class="col-lg-2 control-label">Tanggal Transfer *</label>
                                        <div class="col-lg-5 date">
                                             <div class="input-group input-append date" id="datePicker">
                                                  <input type="text" class="form-control" name="tanggal_bayar" id="tanggal" placeholder="Tanggal Melakukan Transfer" value="" />
                                                  <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                             </div>
                                        </div>
                                   </div>



                                   <div class="form-group row">
                                        <label class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Bank Anda *</label>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                             <input type="text" class="form-control" placeholder="Bank Anda" name="bank_anda" value="" maxlength="50">
                                        </div>
                                   </div>

                                   <div class="form-group row">
                                        <label class="col-lg-2 col-md-3 col-sm-3 col-xs-12">No Rekening Anda *</label>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                             <input type="text" class="form-control" placeholder="No Rekening Anda" name="no_rekening_anda" value="" maxlength="50">
                                        </div>
                                   </div>

                                   <div class="form-group row">
                                        <label class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Nama Rekening Anda *</label>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                             <input type="text" class="form-control" placeholder="Nama Rekening Anda" name="nama_rekening_anda" value="" maxlength="50">
                                        </div>
                                   </div>

                                   <div class="form-group row">
                                        <label class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Bank Midodaren *</label>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                             <input type="text" class="form-control" placeholder="Bank Midodaren" name="bank_midodaren" value="" maxlength="150">
                                        </div>
                                   </div>

                                   <div class="form-group row">
                                        <label class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Nominal Transfer *</label>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                             <input type="text" class="form-control" placeholder="Nominal Transfer" name="nominal_ditransfer" value="" maxlength="150">
                                        </div>
                                   </div>

                                   <div class="form-group row">
                                        <label class="col-lg-2 control-label">Keterangan</label>
                                        <div class="col-lg-5">
                                             <textarea class="form-control" name="keterangan" placeholder="Keterangan Tambahan (Jika ada)" rows="2"></textarea>
                                        </div>
                                   </div>

                                   <div class="form-group row">
                                        <label class="col-lg-2 control-label">Bukti Transfer *</label>
                                        <div class="col-lg-5">
                                             <input type="file" class="form-control" name="foto" accept=".jpg, .png" />
                                        </div>
                                   </div>

                                   <hr>
                                   <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-check fa-fw"></i> Simpan</button>
                                   <button type="reset" name="reset" class="btn btn-default"><i class="fa fa-refresh fa-fw"></i> Refresh</button>

                              </form>
                              <!-- /.form -->
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>