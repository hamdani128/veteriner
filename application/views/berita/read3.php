<style>
    .blog-content {
        text-align: justify;

    }

    .blog-content ol li {
        list-style-type: numeric !important;
    }

    .blog-content ul li {
        list-style-type: disc !important;
    }
</style>

<section class="bg-single-blog">
    <div class="container">
        <div class="row">
            <div class="single-blog">
                <div class="row">
                    <div class="col-md-8">

                        <div class="blog-items">
                            <?php if ($berita->file_img != "") { ?>
                                <div class="blog-img">
                                    <a href="#"><img style="width:770px;height:470px;" src="<?php echo base_url() ?>assets/upload/berita/<?= $berita->file_img; ?>" alt="blog-img-10" class="img-responsive" /></a>
                                </div>
                            <?php } ?>
                            <!-- .blog-img -->
                            <div class="blog-content-box">
                                <div class="meta-box">
                                    <div class="event-author-option">
                                        <div class="event-author-name">
                                            <p>Posted by : <a href="#"> <?php echo $berita->penulis; ?></a></p>
                                        </div>
                                        <!-- .author-name -->
                                    </div>
                                    <!-- .author-option -->
                                    <ul class="meta-post">
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo date('d M Y', strtotime($berita->created_at)); ?></li>
                                    </ul>
                                </div>
                                <!-- .meta-box -->
                                <div class="blog-content">
                                    <h4><?php echo $berita->judul; ?></h4>
                                    <p style="text-align: justify;"><?= $berita->detail1; ?></p>

                                    <?php if (count($detail_berita) > 0) { ?>
                                        <?php foreach ($detail_berita as $row) { ?>
                                            <img src="<?php echo base_url() ?>assets/upload/berita/detail/<?= $row->file_image; ?>" alt="blog-img-10" class="img-responsive" style="width:770px;height:470px;" />
                                            <p style="text-align: justify;"> <?= $row->detail; ?></p>
                                        <?php } ?>
                                    <?php } else { ?>

                                    <?php } ?>
                                    <p style="text-align: justify;"><?= $berita->detail2; ?></p>
                                </div>
                                <!-- .blog-content -->
                            </div>
                            <!-- .blog-content-box -->
                        </div>
                        <!-- .blog-items -->
                    </div>
                    <!-- .col-md-8 -->

                    <!-- .col-md-4 -->
                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="widget">
                                <h4 class="sidebar-widget-title">Berita Lainnya</h4>
                                <div class="widget-content">
                                    <ul class="popular-news-option">
                                        <?php foreach ($listing as $listing) { ?>
                                            <li>
                                                <div class="popular-news-img" style="width: 80px; height: 80px;">
                                                    <a href="#">
                                                        <img src="<?= base_url(); ?>assets/upload/berita/<?= $listing->file_img; ?>" alt="popular-news-img-1" />
                                                    </a>
                                                </div>
                                                <!-- .popular-news-img -->
                                                <div class="popular-news-contant">
                                                    <h5><a href="<?php echo base_url('berita/reader/' . $listing->slug); ?>"><?php echo $listing->judul; ?></a>
                                                    </h5>
                                                    <p><?php echo date('d M Y', strtotime($listing->created_at)); ?>
                                                    </p>
                                                </div>
                                                <!-- .popular-news-img -->
                                            </li>
                                        <?php } ?>
                                    </ul>

                                </div>
                                <!-- .widget-content -->
                            </div>
                        </div>
                        <!-- .sidebar -->
                    </div>
                </div>
                <!-- .row -->
            </div>
            <!-- .single-blog -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>