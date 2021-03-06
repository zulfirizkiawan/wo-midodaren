<div class="fh5co-loader"></div>

<div id="page">
    <nav class="fh5co-nav" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div id="fh5co-logo"><a href="<?php echo base_url(); ?>midodaren/index">Midodaren<strong>.</strong></a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li class="active"><a href="<?php echo base_url(); ?>midodaren/index">Home</a></li>
                        <li class="has-dropdown">
                            <a>Paket Wedding</a>
                       
                            <ul class="dropdown">
                                <li><a href="<?php echo base_url(); ?>midodaren/paketrumah">Paket Wedding Rumah</a></li>
                                <li><a href="<?php echo base_url(); ?>midodaren/pakethotel">Paket Wedding Hotel</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url(); ?>midodaren/layanan">Layanan</a></li>
                        <li><a href="<?php echo base_url(); ?>midodaren/galeri">Galeri</a></li>
                        <li><a href="<?php echo base_url(); ?>midodaren/tentang">Tentang Kami</a></li>
                        <li><a href="<?php echo base_url(); ?>midodaren/hubungi">Hubungi Kami</a></li>

                        <button type="button" class="btn btn-primary"> <a href="<?php echo base_url(); ?>auth/index">LOGIN</a></button>
                        <button type="button" class="btn btn-info"> <a href="<?php echo base_url(); ?>auth/registration">REGISTER</a></button>
                    </ul>
                </div>
            </div>

        </div>
    </nav>

    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(<?php echo base_url('assets/images/img_bg_1.jpeg') ?>)">
        <div class="overlay"></div>
        <div class="fh5co-container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Paket Wedding Rumah</h1>
                            <h2><a href="<?php echo base_url(); ?>midodaren/index"> Home </a> <i class="fa fa-angle-right"> </i> Paket Wedding Rumah </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">

                    <h2>Paket Wedding Rumah</h2>
                    <p>Berikut ini adalah paket wedding rumah yang bisa Anda pilih.</p>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-12">
                    <div class="row">
                        <?php
                        foreach ($produk as $row) {
                        ?>
                            <div class="col-lg-4">
                                <div class="kotak">
                                    <br>
                                    <br>
                                    <form method="post" action="<?php echo base_url(); ?>pemesanan/tambah" method="post" accept-charset="utf-8">
                                        <a href="#"><img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/' . $row['gambar']; ?>" /></a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="#"><?php echo $row['nama_produk']; ?></a>
                                            </h4>
                                            <h5>Rp. <?php echo number_format($row['harga'], 0, ",", "."); ?></h5>
                                            <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                                        </div>
                                        <br>
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

            </div>
        </div>
    </div>

    <footer id="fh5co-footer" role="contentinfo" class="fh5co-section-gray">
        <div class="container">

            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
                        <small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
                    </p>
                    <p>
                    <ul class="fh5co-social-icons">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    </ul>
                    </p>
                </div>
            </div>

        </div>
    </footer>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>