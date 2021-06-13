<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        
            <?= form_error('user', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message') ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Add New paket</a>

            <table class="table">
                <thead>
                    <tr>
                        <th >#</th>
                        <th >nama paket</th>
                        <th >deskripsi</th>
                        
                        <th >rias_busana</th>
                        <th >dekorasi_pelaminan</th>
                        <th >dokumentasi</th>
                        <th >dekorasi_tenda</th>
                        <th >support_acara</th>

                        <th >harga</th>
                        <th >gambar</th>

                        

                        
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($userp as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            
                            <td><?= $m['nama_produk']; ?></td>
                            <td><?= $m['deskripsi']; ?></td>

                            <td><?= $m['rias_busana']; ?></td>
                            <td><?= $m['dekorasi_pelaminan']; ?></td>
                            <td><?= $m['dokumentasi']; ?></td>
                            <td><?= $m['dekorasi_tenda']; ?></td>
                            <td><?= $m['support_acara']; ?></td>
                            
                            <td><?= $m['harga']; ?></td>
                            <td><?= $m['gambar']; ?></td>
                            
                            	
                        
                            
                            <td>
                                <a href="" class="badge badge-pill badge-success">edit</a>
                                <a href="" class="badge badge-pill badge-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/paket/'); ?>" method="post">
                <div class="modal-body">
                               
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="nama_produk">
                    </div>

                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Paket"></textarea>
                    </div>

                    <!-- rias_busana	 -->
                    <div class="form-group">
                        <textarea class="form-control" id="ria_ Busana" name="rias_busana" placeholder="Rias Busana"></textarea>
                    </div>
                    <!-- dekorasi_pelaminan	 -->
                    <div class="form-group">
                        <textarea class="form-control" id="dekorasi_pelaminan	" name="dekorasi_pelaminan	" placeholder="dekorasi_pelaminan"></textarea>
                    </div>
                    <!-- dokumentasi	 -->
                    <div class="form-group">
                        <textarea class="form-control" id="dokumentasi" name="dokumentasi" placeholder="dokumentasi"></textarea>
                    </div>
                    <!-- dekorasi_tenda	 -->
                    <div class="form-group">
                        <textarea class="form-control" id="dekorasi_tenda" name="dekorasi_tenda" placeholder="dekorasi_tenda"></textarea>
                    </div>
                    <!-- support_acara	 -->
                    <div class="form-group">
                        <textarea class="form-control" id="support_acara" name="support_acara" placeholder="support_acara"></textarea>
                    </div>
                    <!-- harga	 -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="harga">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
