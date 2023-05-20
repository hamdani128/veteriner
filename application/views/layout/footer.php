<?php
$site = $this->konfigurasi_model->listing();
?>
<style type="text/css" media="screen">
    .kontakwa {
        z-index: 9999;
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 30px;
        right: 350px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
    }

    .alignTop {
        margin-top: 16px;
    }

    .infoWa {
        z-index: 9;
        position: fixed;
        width: 200px;
        height: 60px;
        bottom: 30px;
        right: 210px;
        background-color: red;
        color: #FFF;
        border-radius: 30px;
        text-align: center;
        font-size: 14px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
        padding-left: 40px;
    }

    .kontakwa a {
        color: white;
        font-size: 40px;
        font-weight: 700;
        text-align: center;
    }

    .kontakwa:hover {
        background-color: #80bfff;
    }

    .textInfo {
        font-size: 12px;
        color: #FFF;
    }

    .textNomor {
        font-size: 16px;
        font-weight: bold;
        color: #FFF;
    }
</style>


<!-- <div class="accessibility"><svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 14 14" height="32" width="32">
        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="7" cy="2.5" r="2"></circle>
            <path d="M2.5 5a7.5 7.5 0 0 0 9 0"></path>
            <path d="M8.5 6.33v4.17h-3V6.33M5.5 10.5v3M8.5 10.5v3"></path>
        </g>
    </svg>
</div> -->

<div class="infoWa">
    <span class="textInfo">Hubungi Kami di</span> <span class="textNomor"><?php echo $site->hp ?></span>
</div>

<a href="https://wa.me/6282164944102?text=Halo,%20BALAI%20VETERINER%20MEDAN%20%20Apakah%20bisa%20dibantu?" class="kontakwa"><i class="fa fa-whatsapp alignTop"></i>
</a>

<!-- END WA -->
<?php
$site           = $this->konfigurasi_model->listing();
$nav_profil     = $this->nav_model->nav_profil();
?>
<!-- Start Footer Section -->
<footer>
    <div class="bg-footer-top" style="background-color: rgb(22, 62, 8);">
        <div class="container">
            <div class="row">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="footer-widgets">
                                <div class="widgets-title">
                                    <h4 style="color: #FFF;"><?php echo $site->namaweb ?></h4>
                                </div>

                                <!-- .widgets-content -->
                                <div class="address-box">
                                    <ul class="address">

                                        <li>
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>
                                                Jl. Gatot Subroto No.255-A, Lalang, Kec. Medan Sunggal, Kota Medan,
                                                Sumatera Utara 20123
                                                bvetmedan@gmail.com
                                            </span>

                                        </li>
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <span><?php echo $site->telepon ?></span>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <span><?php echo $site->email ?></span>

                                        </li>
                                    </ul>
                                </div>
                                <!-- .address -->
                            </div>
                            <!-- .footer-widgets -->
                        </div>
                        <!-- .col-md-4 -->
                        <div class="col-md-6 col-sm-6">
                            <div class="footer-widgets">
                                <div class="widgets-title">
                                    <h3>Lokasi Kantor</h3>
                                </div>
                                <!-- .widgets-title -->
                                <div class="row">
                                    <style type="text/css" media="screen">
                                        iframe {
                                            width: 100%;
                                            height: auto;
                                            min-height: 300px;
                                        }
                                    </style>
                                    <div id="map"><?php echo $site->google_map; ?>
                                        <div class="widgets-title" style="padding-top: 50px;">
                                            <h3>Media Sosial</h3>
                                        </div>
                                        <ul class="social-icon-rounded">
                                            <li><a href="https://www.facebook.com/bvetmedan"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="https://www.instagram.com/bvetmedan/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="https://twitter.com/bvetmedan"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="https://www.youtube.com/@balaiveterinermedanofficia3634"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- .footer-widgets -->
                        </div>


                    </div>
                    <!-- .row -->
                </div>
                <!-- .footer-top -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .bg-footer-top -->

    <div class="bg-footer-bottom">
        <div class="container">
            <div class="row text-center">
                <!-- <ul class="social-icon-rounded">
                    <li><a href="https://www.facebook.com/bvetmedan"><i class="fa fa-facebook"
                                aria-hidden="true"></i></a>
                    </li>
                    <li><a href="https://www.instagram.com/bvetmedan/"><i class="fa fa-instagram"
                                aria-hidden="true"></i></a>
                    </li>
                    <li><a href="https://twitter.com/bvetmedan"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="https://www.youtube.com/@balaiveterinermedanofficia3634"><i class="fa fa-youtube"
                                aria-hidden="true"></i></a>
                    </li>
                </ul> -->
                <p> Production By : Veteriner Dev &copy; <?php echo date('Y') ?> </a></p>
                <!-- .footer-bottom -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .bg-footer-bottom -->

</footer>

<!-- End Footer Section -->


<!-- Start Scrolling -->

<div class="scroll-img">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</div>
<div class="floatingMenu" style="margin-right: 30px;">
    <div class="col-lg-12 menuBox" onclick="to_cek_hasil_uji()"> <i class="fa fa-edit fa-3x" aria-hidden="true" style="color:white"></i>
        <div>Cek Hasil Uji</div>
    </div>
    <div class="col-lg-12 menuBox" onclick="to_terkini()"> <i class="fa fa-newspaper-o fa-3x" aria-hidden="true" style="color:white"></i>
        <div>Terkini</div>
    </div>
    <div class="col-lg-12 menuBox" onclick="to_layanan()"> <i class="fa fa-handshake-o fa-3x" aria-hidden="true" style="color:white"></i>
        <div>Layanan</div>
    </div>
    <div class="col-lg-12 menuBox" onclick="to_publikasii()"> <i class="fa fa-list fa-3x" aria-hidden="true" style="color:white"></i>
        <div>Publikasi</div>
    </div>
    <div class="col-lg-12 menuBox" onclick="to_pengumuman()"> <i class="fa fa-volume-up fa-3x" aria-hidden="true" style="color:white"></i>
        <div>Pengumuman</div>
    </div>
    <div class="col-lg-12 menuBox" onclick="to_harga()"> <i class="fa fa-envelope-o fa-3x" aria-hidden="true" style="color:white"></i>
        <div>Harga</div>
    </div>
    <div class="col-lg-12 menuBox" onclick="to_webmail()"> <i class="fa fa-money fa-3x" aria-hidden="true" style="color:white"></i>
        <div>Webmail</div>
    </div>
</div>

<!-- End Scrolling -->


</div>


<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/lightcase.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery.nstSlider.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/custom.map.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/plugins.isotope.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/custom.isotope.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/custom.js"></script>
<!-- sweetalert -->
<script src="<?php echo base_url() ?>assets/admin/sweetalert/sweetalert2.js"></script>
<script src="<?php echo base_url() ?>assets/admin/sweetalert/sweetalert2.all.js"></script>
<script src="<?php echo base_url() ?>assets/admin/sweetalert/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/sweetalert/sweetalert2.all.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.full.min.js"></script>
<!-- DataTables JS -->
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
    $(function() {
        $("#example1").DataTable();
    });
</script>
<script>
    function base_url(string_url) {
        var pathparts = location.pathname.split('/');
        if (location.host == 'localhost') {
            var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
        } else {
            var url = location.origin + '/' + string_url; // http://stackoverflow.com
        }
        return url;
    }
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        ClassicEditor
            .create(document.querySelector('.editorku'))
            .then(function(editor) {
                // The editor instance
            })
            .catch(function(error) {
                console.error(error)
            })

        // bootstrap WYSIHTML5 - text editor

        $('#keterangan').wysihtml5({
            toolbar: {
                fa: true
            }
        })
    })

    function to_cek_hasil_uji() {
        document.location.href = '#check_hasil_uji'
    }

    function to_terkini() {
        document.location.href = base_url('berita');
    }

    function to_layanan() {
        document.location.href = base_url('berita/kategori/kegiatan');
    }

    function to_publikasii() {
        document.location.href = base_url('download');
    }
</script>

</html>