<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-6">
            

            

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nama paket</th>
                        <th scope="col">nama pemesan</th>
                        
                        <th scope="col">telp</th>
                        <th scope="col">tgl transaksi</th>
                        <th scope="col">harga</th>
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pesanans as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            
                            <td><?= $m['nama_produk']; ?></td>
                            <td><?= $m['nama']; ?></td>

                            <td><?= $m['telp']; ?></td>
                            <td><?= $m['tanggal']; ?></td>
                            <td><?= $m['harga']; ?></td>
                            
                            	
                        
                            
                            <td>
                                <!-- <a href="" class="badge badge-pill badge-success">edit</a>
                                <a href="" class="badge badge-pill badge-danger">delete</a> -->
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
<!--  -->