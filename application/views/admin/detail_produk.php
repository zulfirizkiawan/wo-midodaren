<h2><?php echo $detail['nama_produk']; ?></h2>
<form method="post" action="<?php echo base_url(); ?>Pemesanan/tambah" method="post" accept-charset="utf-8">
    <div class="kotak2">

        <img width="500px" height="500px" class="img-responsive" src="<?php echo base_url() . 'assets/images/' . $detail['gambar']; ?>" />
        <h5><br>Harga: Rp. <?php echo number_format($detail['harga'], 0, ",", "."); ?></h5>
        <p class="card-text">
            <strong> <br> <u>DESKIRPSI</u></strong><br>
            <?php echo $detail['deskripsi']; ?>
        </p>
        <p class="card-text">
            <strong> <u>RIAS BUASANA</u></strong><br>
            <?php echo $detail['rias_busana']; ?>
        </p>
        <p class="card-text">
            <strong> <u>DEKORASI PELAMINAN</u></strong><br>
            <?php echo $detail['dekorasi_pelaminan']; ?>
        </p>
        <p class="card-text">
            <strong> <u>DOKUMENTASI</u></strong><br>
            <?php echo $detail['dokumentasi']; ?>
        </p>
        <p class="card-text">
            <strong> <u>DEKORASI TENDA</u></strong><br>
            <?php echo $detail['dekorasi_tenda']; ?>
        </p>
        <p class="card-text">
            <strong> <u>SUPPORT ACARA</u></strong><br>
            <?php echo $detail['support_acara']; ?>
        </p>





        <input type="hidden" name="id" value="<?php echo $detail['id_produk']; ?>" />
        <input type="hidden" name="nama" value="<?php echo $detail['nama_produk']; ?>" />

        <input type="hidden" name="harga" value="<?php echo $detail['harga']; ?>" />
        <input type="hidden" name="gambar" value="<?php echo $detail['gambar']; ?>" />
        <input type="hidden" name="qty" value="1" />
        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-shopping-cart"></i> Beli Produk Ini</button>
    </div>
</form>