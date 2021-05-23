<!-- <div class="mx-auto" style="width: 300px;"> -->
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <div center>
    <h2 class="h2 mb-4 text-gray-800">Daftar Produk</h2>
  </div>
</div>
</div>

<div class="col-lg-3">



  <div class="list-group">
    <a href="<?php echo base_url() ?>shopping/tampil_cart" class="list-group-item"><strong><i class="glyphicon glyphicon-shopping-cart"></i> KERANJANG BELANJA</strong></a>
    <?php

    $cart = $this->cart->contents();

    // If cart is empty, this will show below message.
    if (empty($cart)) {
    ?>
      <a class="list-group-item">Keranjang Belanja Kosong</a>
      <?php
    } else {
      $grand_total = 0;
      foreach ($cart as $item) {
        $grand_total += $item['subtotal'];
      ?>
        <a class="list-group-item"><?php echo $item['name']; ?> (<?php echo $item['qty']; ?> x <?php echo number_format($item['price'], 0, ",", "."); ?>)=<?php echo number_format($item['subtotal'], 0, ",", "."); ?></a>
      <?php
      }
      ?>

    <?php
    }
    ?>
  </div>
</div>
<div class="row">
  <?php
  foreach ($produk as $row) {
  ?>
    <div class="col-lg-4">
      <div class="kotak">
        <form method="post" action="<?php echo base_url(); ?>pemesanan/tambah" method="post" accept-charset="utf-8">
          <a href="#"><img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/' . $row['gambar']; ?>" /></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#"><?php echo $row['nama_produk']; ?></a>
            </h4>
            <h5>Rp. <?php echo number_format($row['harga'], 0, ",", "."); ?></h5>
            <p class="card-text"><?php echo $row['deskripsi']; ?></p>
          </div>
          <div class="card-footer">
            <a href="<?php echo base_url(); ?>pemesanan/detail_produk/<?php echo $row['id_produk']; ?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search"></i> Detail</a>

            <input type="hidden" name="id" value="<?php echo $row['id_produk']; ?>" />
            <input type="hidden" name="nama" value="<?php echo $row['nama_produk']; ?>" />
            <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>" />
            <input type="hidden" name="gambar" value="<?php echo $row['gambar']; ?>" />
            <input type="hidden" name="qty" value="1" />
            <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</button>
          </div>
        </form>
      </div>
    </div>
  <?php
  }
  ?>
</div>
</div>