<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-3">
            <?= form_error('user', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message') ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newTambahPaket">Tambah Paket</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nama paket</th>
                        <th scope="col">deskripsi</th>
                        
                        <th scope="col">rias_busana</th>
                        <th scope="col">dekorasi_pelaminan</th>
                        <th scope="col">dokumentasi</th>
                        <th scope="col">dekorasi_tenda</th>
                        <th scope="col">support_acara</th>

                        <th scope="col">harga</th>
                        <th scope="col">gambar</th>

                        

                        
                        <th scope="col">Action</th>
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


<!-- Modal -->
<div class="modal fade" id="newTambahPaket" tabindex="-1" aria-labelledby="newTambahPaketLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTambahPaketLabel">Tambah Paket</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/paket');  ?>" method="post">

                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nama Paket">
                    </div>

                    <div class="form-group">
                        <select name="kategori-id" id="kategori-id" class="form-control">
                            <option value="">Select Kategori</option>

                            <?php foreach ($kategori as $m) : ?>
                                <option value="<?= $m['id'] ?>">

                                <?= $m['nama_kategori']; ?>

                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Paket">
                    </div>

                    <!-- rias_busana	 -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="ria_ Busana" name="rias_busana" placeholder="Rias Busana">
                    </div>
                    <!-- dekorasi_pelaminan	 -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="dekorasi_pelaminan	" name="dekorasi_pelaminan	" placeholder="dekorasi_pelaminan	">
                    </div>
                    <!-- dokumentasi	 -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="dokumentasi" name="dokumentasi" placeholder="dokumentasi">
                    </div>
                    <!-- dekorasi_tenda	 -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="dekorasi_tenda" name="dekorasi_tenda" placeholder="dekorasi_tenda">
                    </div>
                    <!-- support_acara	 -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="support_acara" name="support_acara" placeholder="support_acara">
                    </div>
                    <!-- harga	 -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="harga">
                    </div>
                    <!-- gambar -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="gambar" name="gambar" placeholder="gambar">
                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>