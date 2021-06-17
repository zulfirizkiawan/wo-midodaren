
<section>
<div class="container">
		<div class="row">
         <div class="col-sm-12"> <!--panel-->
         <h2 class="text-center"><i class="fa fa-list fa-fw"></i> Daftar Konfirmasi Pembayaran</h2>
         
            <div class="panel panel-default">
                 <div class="panel-heading">
                 <a href="buat_konfirmasi.php" title="Buat Konfirmasi Baru" class="btn btn-primary">Buat Konfirmasi</a>
                 </div>
                 <br>
                 <div class="panel-body">
                 <form action="" method="post" enctype="multipart/form-data" role="form">
                            
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-3 col-xs-12">No. Transaksi *</label>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <input type="text" class="form-control" placeholder="Nomor Transaksi" name="no" value="" maxlength="50">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Nama Pemilik Rekening *</label>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <input type="text" class="form-control" placeholder="Nama Pemilik Rekening Anda" name="nama" value="" maxlength="50">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Jumlah Transfer *</label>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <input type="text" class="form-control" placeholder="Nominal Jumlah Transfer" name="jumlah" value="" maxlength="50">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                 <label class="col-lg-2 control-label">Tanggal Transfer *</label>
                                 <div class="col-lg-5 date">
                                      <div class="input-group input-append date" id="datePicker">
                                           <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal Melakukan Transfer" value=""/>
                                           <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                      </div>
                                 </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Bank Asal *</label>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <input type="text" class="form-control" placeholder="Nama Bank Anda" name="bank_asal" value="" maxlength="150">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Bank Tujuan *</label>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <input type="text" class="form-control" placeholder="Bank Tujuan Transfer" name="bank_tujuan" value="" maxlength="150">
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                 <label class="col-lg-2 control-label">Catatan Tambahan</label>
                                        <div class="col-lg-5">
                                        <textarea class="form-control" name="keterangan" placeholder="Keterangan Tambahan (Jika ada)" rows="2"></textarea>
                                 </div>
                            </div>
                            
                            <div class="form-group row">
                                 <label class="col-lg-2 control-label">Bukti Transfer *</label>
                                        <div class="col-lg-5">
                                        <input type="file" class="form-control" name="foto" accept=".jpg, .png"/>
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