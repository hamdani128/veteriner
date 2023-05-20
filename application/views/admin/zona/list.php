<p class="btn-group">
    <button class="btn btn-success btn-lg" type="button" onclick="tambah_data_zona()">
        <i class="fa fa-plus"></i> Tambah Data
    </button>
</p>


<div class="table-responsive mailbox-messages">
    <table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr class="bg-info">
                <th>No</th>
                <th>#Act</th>
                <th>File Logo</th>
                <th>URL</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($datazona) > 0) { ?>
                <?php $no = 1; ?>
                <?php foreach ($datazona as $row) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <div class="input-group">
                                <button class="btn btn-md btn-warning" onclick="edit_zona('<?= $row->id; ?>')">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-md btn-danger" onclick="delete_zona('<?= $row->id; ?>')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                        <td>
                            <img src="<?= base_url() ?>assets/upload/zona/<?= $row->file_img; ?>" alt="" style="height: 20%;width: 20%;">
                        </td>
                        <td><?= $row->url; ?></td>
                        <td><?= $row->keterangan; ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>


<!-- modal tambah -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="my-modal-title">Tambah Data Zona Integritas</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#" method="post" id="insert_zona">

                            <div class="form-group">
                                <label for="">File Images</label>
                                <input type="file" name="file_img" id="file_img" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">URL</label>
                                <input type="text" name="url" id="url" class="form-control" placeholder="Masukkan URL">
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="5" rows="5" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-md btn-primary" onclick="simpan_data_zona()">
                    <i class="fa fa-save"></i>
                    Simpan Data
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->


<!-- modal tambah -->
<div id="my-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white" id="my-modal-title">Edit Data Zona Integritas</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#" method="post" id="update_zona">
                            <input type="hidden" name="id_update" id="id_update">
                            <div class="form-group">
                                <img src="" alt="" id="img_display" style="width: 30%;height: 30%;">
                            </div>
                            <div class="form-group">
                                <label for="">File Images</label> <span> (Jika Anda ingin mengganti icon, jika tidak
                                    maka
                                    tidak
                                    perlu diinput)</span>
                                <input type="file" name="file_img_update" id="file_img_update" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">URL</label>
                                <input type="text" name="url_update" id="url_update" class="form-control" placeholder="Masukkan URL">
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan_update" id="keterangan_update" cols="5" rows="5" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-md btn-warning" onclick="update_data_zona()">
                    <i class="fa fa-save"></i>
                    Update Data
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->


<!-- script -->
<script>
    function tambah_data_zona() {
        $("#my-modal").modal("show");
    }

    function simpan_data_zona() {
        var formupload = document.getElementById("insert_zona");
        var file = document.getElementById("file_img").files.length;
        var url = $("#url").val();
        var keterangan = $("#keterangan").val();
        if (keterangan == "" || url == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Notifkasi !',
                text: 'Harap Wajib Mengisi Field - Field yang Sudah Tersediakan !'
            });
        } else if (file == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Notifkasi !',
                text: 'Harap Wajib Memasukkan File Gambar !'
            });
        } else {
            var formdata = new FormData(formupload);
            $.ajax({
                url: "<?php echo base_url('admin/zona/tambah') ?>",
                method: "POST",
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil disimpan!'
                        });
                        document.location.reload();
                    }
                }
            });
        }

    }

    function edit_zona(id) {
        $.ajax({
            url: "<?php echo base_url('admin/zona/edit_show') ?>",
            method: "POST",
            data: {
                id: id,
            },
            dataType: "JSON",
            success: function(data) {
                $("#id_update").val(data.id);
                // Set the text of the file input field
                $("#img_display").attr("src", "<?php echo base_url() ?>assets/upload/zona/" + data.file_img);
                // Set the value of the file input field
                $("#url_update").val(data.url);
                $("#keterangan_update").val(data.keterangan);
                $("#my-modal-edit").modal("show");
            }
        });
    }

    function update_data_zona() {
        var formupload = document.getElementById("update_zona");
        var formdata = new FormData(formupload);
        $.ajax({
            url: "<?php echo base_url('admin/zona/update') ?>",
            method: "POST",
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if (data.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil Dirubah!'
                    });
                    document.location.reload();
                }
            }
        });
    }

    function delete_zona(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda Akan Menghapus Data ini !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Data !',
            cancelButtonText: 'Tidak, Batalkan !'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?php echo base_url('admin/zona/delete') ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil !',
                                text: 'Data Berhasil Dihapus !',
                            }).then((result) => {
                                if (result.value) {
                                    document.location.reload();
                                }
                            });
                        }
                    }
                });
            }
        });
    }
</script>