<!-- Start Upcoming Events Section -->


<section class="bg-upcoming-events">
    <div class="container">
        <div class="row">
            <div class="upcoming-events">
                <div class="section-header">
                    <h2>Berita terbaru</h2>
                </div>
                <!-- .section-header -->
                <div class="row">
                    <div class="container">
                        <?php foreach ($berita as $berita) { ?>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="event-items">
                                    <div class="event-img">
                                        <a href="<?php echo base_url('berita/reader/' . $berita->slug); ?>"><img style="width:570px;height:300px;" src="<?php echo base_url('assets/upload/berita/' . $berita->file_img); ?>" alt="upcoming-events-img-1" class="img-responsive" /></a>
                                        <div class="date-box">
                                            <h3><?php echo date('d', strtotime($berita->created_at)); ?></h3>
                                            <h5><?php echo date('M', strtotime($berita->created_at)); ?></h5>
                                        </div>
                                        <!-- .date-box -->
                                    </div>
                                    <!-- .event-img -->
                                    <div class="events-content">
                                        <div style="min-height: 120px !important;">
                                            <h3><a href="<?php echo base_url('berita/reader/' . $berita->slug); ?>"><?php echo $berita->judul; ?></a>
                                            </h3>
                                            <ul class="meta-post">
                                                <li><i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    <?php echo date('H:i', strtotime($berita->created_at)); ?></li>
                                                <li><i class="fa fa-user"></i> <?php echo $berita->penulis; ?></li>
                                                <li>
                                                    <div>
                                                        share :
                                                        <!-- Facebook -->
                                                        <a href="https://www.facebook.com/bvetmedan" target="_blank" style="margin-left:5px;"><i class="fa fa-facebook" aria-hidden="true" style="color:#2b4170"></i></a>

                                                        <!-- Twitter -->
                                                        <a href="https://twitter.com/bvetmedan" target="_blank" style="margin-left:5px;"><i class="fa fa-twitter" aria-hidden="true" style="color: #00b9ff"></i></a>

                                                        <!-- Google+ -->
                                                        <a href="https://www.instagram.com/bvetmedan/" target="_blank" style="margin-left:5px;"><i class="fa fa-instagram" aria-hidden="true" style="color:purple"></i></a>
                                                        <a href="https://www.youtube.com/@balaiveterinermedanofficia3634" style="margin-left:5px;"><i class="fa fa-youtube" aria-hidden="true" style="color: red;"></i></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="text-justify">
                                            <?php echo character_limiter(strip_tags($berita->detail1), 200); ?>
                                        </p>
                                        <a href="<?php echo base_url('berita/reader/' . $berita->slug); ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i> Selengkapnya</a>
                                    </div>
                                    <!-- .events-content -->
                                </div>
                                <!-- .events-items -->
                            </div>
                        <?php } ?>
                    </div>

                    <!-- .col-md-6 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="container">
                        <a href="<?php echo base_url('berita') ?>" class="btn btn-md btn-primary btn-block">Selengkapnya
                            >></a>
                    </div>
                </div>
            </div>
            <!-- .upcoming-events -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>


<!-- End Upcoming Events Section -->