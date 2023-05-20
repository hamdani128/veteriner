<?php
$site                       = $this->konfigurasi_model->listing();
$site_nav                   = $this->konfigurasi_model->listing();
$nav_profil                 = $this->nav_model->nav_profil();
$nav_download               = $this->nav_model->nav_download();
$nav_berita                 = $this->nav_model->nav_berita();
$nav_agenda                 = $this->nav_model->nav_agenda();
$nav_layanan                = $this->nav_model->nav_layanan();
?>
<!-- Start Menu -->
<div class="bg-main-menu menu-scroll">
    <div class="container">
        <div class="row">
            <div class="main-menu">
                <a class="show-res-logo" href="<?php echo base_url() ?>" style="float:left"><img
                        src="<?php echo $this->website->logo() ?>" alt="logo" class="img-responsive"
                        style="max-height: 60px; width: auto;" /></a>

                <nav class="navbar">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="row col-lg-4 row-no-gutters text-center" style="margin-bottom:8px">
                        <a class="navbar-brand hidden-xs hidden-sm" href="<?php echo base_url() ?>"><img
                                src="<?php echo $this->website->logo() ?>" alt="logo" class="img-responsive"
                                style="max-height: 70px;padding-bottom: 10px;" /></a>
                        <a class="navbar-brand hidden-lg hidden-md" href="<?php echo base_url() ?>"><img
                                src="<?php echo $this->website->logo() ?>" alt="logo" class="img-responsive"
                                style="max-height: 80px; width: auto;margin-top:10px" /></a>

                        <div style="font-size: 16px;color: rgb(51, 51, 51);font-weight:bold;margin-top: 15px;"
                            class="col-lg-8 col-sm-8 col-xs-8">
                            KEMENTRIAN
                            PERTANIAN</div>
                        <div style="font-size: 14px; font-weight:bold;word-wrap: break-word;margin-right: 10px;color: rgb(51, 51, 51);"
                            class="col-lg-8 col-sm-8 col-xs-8"> BALAI
                            VETERINER MEDAN</div>

                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <!-- home -->
                            <li><a href="<?php echo base_url() ?>"
                                    class="<?php if($this->uri->uri_string() == '') { echo 'active'; } ?>">BERANDA</a>
                            </li>
                            <!-- PROFIL -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">TENTANG<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <?php foreach ($nav_profil as $nav_profil) { ?>
                                    <li class="sub-active"><a
                                            href="<?php echo base_url('berita/profil/' . $nav_profil->slug_berita) ?>"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            <?php echo $nav_profil->judul_berita ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <!-- Artikel -->
                            <li><a href="<?php echo base_url('download') ?>"
                                    class="<?php if($this->uri->uri_string() == 'download') { echo 'active'; } ?>">PUBLIKASI</a>
                            </li>

                            <!-- berita -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">BERITA <span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <?php foreach ($nav_berita as $nav_berita) { ?>
                                    <li class="sub-active"><a
                                            href="<?php echo base_url('berita/kategori/' . $nav_berita->slug_kategori) ?>"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            <?php echo $nav_berita->nama_kategori ?></a></li>
                                    <?php } ?>
                                    <li class="sub-active"><a href="<?php echo base_url('berita') ?>"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i> Indeks
                                            Berita</a></li>
                                </ul>
                            </li>

                            <!-- LAYANAN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">LAYANAN<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <?php foreach ($nav_layanan as $nav_layanan) { ?>
                                    <li class="sub-active">
                                        <a href="<?php echo base_url('berita/layanan/' . $nav_layanan->slug_berita) ?>"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            <?php echo $nav_layanan->judul_berita ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>


                            <!-- galeri -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">organisasi <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">

                                    <!-- <li class="sub-active"><a href="<?php echo base_url('galeri'); ?>"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i> Galeri Foto</a>
                                    </li>
                                    <li class="sub-active"><a href="<?php echo base_url('video'); ?>"><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i> Galeri
                                            Video</a></li> -->
                                    <li class="sub-active">
                                        <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            Struktur Organisasi
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <!-- DOWNLOAD -->


                            <!-- kontak  -->
                            <li><a href="<?php echo base_url('kontak') ?>"
                                    class="<?php if($this->uri->uri_string() == 'kontak') { echo 'active'; } ?>">KONTAK</a>
                            </li>
                        </ul>
                        <!-- <div class="menu-right-option pull-right">


                            <div class="search-box">
                                <i class="fa fa-search first_click" aria-hidden="true" style="display: block;"></i>
                                <i class="fa fa-times second_click" aria-hidden="true" style="display: none;"></i>
                            </div>
                            <div class="search-box-text">
                                <form action="http://demos.codexcoder.com/labartisan/html/GreenForest/search">
                                    <input type="text" name="search" id="all-search" placeholder="Search Here">
                                </form>
                            </div>
                        </div> -->
                        <!-- .header-search-box -->
                    </div>
                    <!-- .navbar-collapse -->
                </nav>
            </div>
            <!-- .main-menu -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</div>
<!-- .bg-main-menu -->
</header>