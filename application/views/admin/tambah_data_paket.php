<!doctype html>
<html>
    <head>
        <title>Admin Page | Add New Product</title>
        <!-- Load JQuery dari CDN -->
        <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        
        <!-- Load DataTables dan Bootstrap dari CDN -->
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
    </head>
    <body>
        <!-- dalam div row harus ada col yang maksimum nilainya 12 -->
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h1>Add New Product</h1>
                <div><?= validation_errors() ?></div>
                <?= form_open_multipart('admin/tambah_data_paket/create', ['class'=>'form-horizontal']) ?>
                    
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">nama_produk</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_produk" placeholder="" value="<?= set_value('nama_produk') ?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">rias_busana</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="rias_busana"><?= set_value('rias_busana') ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">dekorasi_pelaminan</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="dekorasi_pelaminan"><?= set_value('dekorasi_pelaminan') ?></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">dokumentasi</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="dokumentasi"><?= set_value('dokumentasi') ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">dekorasi_tenda</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="dekorasi_tenda"><?= set_value('dekorasi_tenda') ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">support_acara</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="support_acara"><?= set_value('support_acara') ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">harga</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="harga" placeholder="" value="<?= set_value('harga') ?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">kategori</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="kategori" placeholder="" value="<?= set_value('kategori') ?>">
                        </div>
                      </div> -->
                      
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">gamber</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="userfile" >
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Save</button>
                        </div>
                      </div>
                    
                <?= form_close() ?>
            </div>
            <div class="col-md-1"></div>
        </div>
        
        
        <script>
            $(document).ready(function(){
                $('#myTable').DataTable();
            });
        </script>
    </body>
</html>