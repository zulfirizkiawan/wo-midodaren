<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Add New paket</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>nama paket</th>
                        <th>rias_busana</th>
                        <th>dekorasi_pelaminan</th>
                        <th>dokumentasi</th>
                        <th>dekorasi_tenda</th>
                        <th>support_acara</th>
                        <th>harga</th>
                        <th>gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($paket as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>

                            <td><?= $m['nama_produk']; ?></td>


                            <td><?= $m['rias_busana']; ?></td>
                            <td><?= $m['dekorasi_pelaminan']; ?></td>
                            <td><?= $m['dokumentasi']; ?></td>
                            <td><?= $m['dekorasi_tenda']; ?></td>
                            <td><?= $m['support_acara']; ?></td>

                            <td><?= $m['harga']; ?></td>
                            <td><?= $m['gambar']; ?></td>

                            <td>

                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deleteSubmenu">Delete</a>
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
            <form action="<?= base_url('admin/paket/'); ?>" method="post"  enctype="multipart/form-​data">
           
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="nama_produk">
                    </div>

                    <div class="form-group">
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="">Select Kategori</option>
                            <?php foreach ($produk as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['nama_kategori']; ?></option>
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
                        <textarea class="form-control" id="dekorasi_pelaminan" name="dekorasi_pelaminan" placeholder="dekorasi_pelaminan"></textarea>
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

                    <!-- gambar	 -->
                    <div class="form-group">
                        <input type="file" class="form-control" id="gambar" name="gambar" placeholder="gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add paket</button>
                </div>
               
            </form>
        </div>
    </div>
</div>
</div>
</div>