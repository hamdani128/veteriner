<section class="bg-servicesstyle2-section" style="background-color: rgb(245, 253, 237);">
    <div class="container">
        <div class="row">
            <div class="our-services-option">
                <div class="section-header">
                    <h2>Zona Integritas</h2>
                </div>
                <!-- .section-header -->
                <div class="row">

                    <!-- <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="https://bvetmedan.id/assets/img/footer/wbs.png" class="img-fluid" alt=""></a>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="https://bvetmedan.id/assets/img/footer/wbk.png" class="img-fluid" alt=""></a>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="https://bvetmedan.id/assets/img/footer/jujur.png" class="img-fluid" alt=""></a>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="https://bvetmedan.id/assets/img/footer/spi.png" class="img-fluid" alt=""></a>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="https://bvetmedan.id/assets/img/footer/kan.png" class="img-fluid" alt=""></a>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="https://bvetmedan.id/assets/img/footer/garuda1.png" class="img-fluid" alt=""></a>
                    </div> -->

                    <?php foreach ($zonadata as $row) { ?>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="<?= base_url() ?>assets/upload/zona/<?= $row->file_img; ?>"
                                class="img-fluid" alt=""></a>
                    </div>
                    <?php } ?>

                </div>
                <!-- .row -->
            </div>
            <!-- .our-services-option -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>


<!-- End Service Style2 Section -->