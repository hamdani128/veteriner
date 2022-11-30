<section class="bg-servicesstyle2-section">
    <div class="container">
        <div class="row">
            <div class="our-services-option">
                <div class="section-header">
                    <h2><?php //echo $title ?> DOWNLOAD</h2>
                </div>
                <!-- .section-header -->
                <div class="row">

                    <style type="text/css" media="screen">
                    th,
                    td {
                        text-align: left !important;
                        vertical-align: top !important;
                        padding: 6px 12px !important;
                        color: #000 !important;
                    }
                    </style>

                    <div class="col-md-12">
                        <?php if($this->uri->segment(3) == "") { ?>
                        <p class="alert alert-success">Berikut data file yang dapat Anda unduh</p>

                        <?php }else{ ?>
                        <p class="alert alert-success">Berikut data file dengan kategori
                            <strong><?php echo $kategori_download->nama_kategori_download ?></strong> yang dapat Anda
                            unduh
                        </p>
                        <?php } ?>
                        <div class="table-responsive mailbox-messages">
                            <table id="example1" class="display table table-bordered table-hover" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Judul</th>
                                        <th>Keterangan</th>
                                        <th width="5%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($download as $download) { ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $download->judul_download ?></td>
                                        <td><?php echo $download->isi ?></td>
                                        <td>
                                            <!-- <a href="<?php echo base_url('download/unduh/'.$download->id_download) ?>"
                                                class="btn btn-primary btn-xs" target="_blank">
                                                <i class="fa fa-download"></i> Unduh
                                            </a> -->
                                            <button class="btn btn-md btn-primary" type="button"
                                                onclick="call_download_file('<?php echo $download->id_download ?>')">
                                                <i class="fa fa-download"></i>
                                                Unduh
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End .row -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Harap Registrasi Data Terlebih Dahulu Untuk Bisa Mendapatkan Data
                </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="hidden" class="form-control" name="id_download" id="id_download">
                        <div class="form-group">
                            <label for="" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="masukkan E-mail Aktif Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Isi Nama Lengkap Anda">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Kategori</label>
                            <select name="cmb_kategori" id="cmb_kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Peneliti">Peneliti</option>
                                <option value="Praktisi Veteriner">Praktisi Veteriner</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-md btn-primary btn-block" onclick="download_file()">
                            <i class="fa fa-download"></i> Download
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Modal -->


<!-- Script -->
<script>
function call_download_file(id_download) {
    var id_down = document.getElementById("id_download").value = id_download;
    $("#my-modal").modal("show");
}

function download_file() {
    var id_download = $("#id_download").val();
    var nama = $("#nama").val();
    var email = $("#email").val();
    var cmb_kategori = $("#cmb_kategori").val();
    if (nama == '' || email == '' || cmb_kategori == '') {
        Swal.fire({
            icon: 'warning',
            title: 'Mohon Perhatian !',
            text: 'Harap Registrasi Data Terlebih Dahulu Dengan Mengisi Data Lengkap',
            showConfirmButton: false,
            timer: 1500
        });
    } else {
        $.ajax({
            url: "<?php echo base_url('download/entry_register') ?>",
            method: "POST",
            data: {
                nama: nama,
                email: email,
                kategori: cmb_kategori,
            },
            dataType: "json",
            success: function(data) {
                if (data.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil disimpan!'
                    });
                    document.location.href =
                        'download/unduh/' + id_download;
                }
            }
        });
    }


}
</script>
<!-- End Script -->