<p class="btn-group">
    <button class="btn btn-success btn-lg" type="button" onclick="tambah_pengujian()">
        <i class="fa fa-plus"></i> Tambah Data
    </button>
    <button class="btn btn-dark" type="button" onclick="import_epidiomologi()">
        <i class="fa fa-list"></i> Import Data
    </button>
</p>


<div class="table-responsive mailbox-messages">
    <table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr class="bg-info">
                <th>No</th>
                <th>#Act</th>
                <th>Jenis Pengujian</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($pengujian) > 0) {
                $no = 1; ?>
            <?php foreach ($pengujian as $row) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td>
                    <div class="button-group">
                        <button class="btn btn-md btn-warning" onclick="edit_show_pengujian('<?php echo $row->id; ?>')">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-md btn-danger"
                            onclick="delete_data_pengujian('<?php echo $row->id; ?>', '<?php echo $row->pengujian; ?>')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </td>
                <td><?php echo $row->pengujian; ?></td>
                <td><?php echo $row->harga; ?></td>
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
                <h5 class="modal-title text-white" id="my-modal-title">Tambah Data Pengujian</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="post" id="insert_epidomologi">
                            <div class="form-group">
                                <label for="">Jenis Pengujian</label>
                                <input type="text" name="jenis_pengujian" id="jenis_pengujian" class="form-control"
                                    placeholder="Masukkan Jenis Pengujian">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control"
                                    placeholder="Masukkan Harga">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-md btn-primary" onclick="simpan_data_pengujian()">
                    <i class="fa fa-save"></i>
                    Simpan Data
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Edit -->
<div id="my-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white" id="my-modal-title">Update Data Pengujian</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="post" id="insert_epidomologi">
                            <div class="form-group">
                                <input type="hidden" name="id_update" id="id_update" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Pengujian</label>
                                <input type="text" name="jenis_pengujian_update" id="jenis_pengujian_update"
                                    class="form-control" placeholder="Masukkan Jenis Pengujian">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="harga_update" id="harga_update" class="form-control"
                                    placeholder="Masukkan Harga">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-md btn-warning" onclick="update_data_pengujian()">
                    <i class="fa fa-save"></i>
                    Update Data
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit -->

<!-- Modal Import Data -->
<div id="my-modal-import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="my-modal-title">Import Data Pengujian</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="post" id="import-file">
                            <div class="form-group">
                                <label for="">Masukkan File</label>
                                <input type="file" class="form-control" name="fileExcel" id="fileExcel">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-md btn-primary" type="button" onclick="simpan_import_pengujian()">
                    <i class="fa fa-save"></i>
                    Simpan Data
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Import -->

<!-- script -->
<script>
function import_epidiomologi() {
    $("#my-modal-import").modal("show");
}

function tambah_pengujian() {
    $("#my-modal").modal("show");
}

function simpan_data_pengujian() {
    var jenis_pengujian = $("#jenis_pengujian").val();
    var harga = $("#harga").val();
    if (jenis_pengujian == "" || harga == "") {
        Swal.fire({
            icon: 'warning',
            title: 'Notifkasi !',
            text: 'Harap Wajib Mengisi Field - Field yang Sudah Tersediakan !'
        });
    } else {
        $.ajax({
            url: "<?php echo base_url('admin/pengujian/tambah') ?>",
            method: "POST",
            data: {
                pengujian: jenis_pengujian,
                harga: harga,
            },
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

function simpan_import_pengujian() {
    var formupload = document.getElementById("import-file");
    var formdata = new FormData(formupload);
    $.ajax({
        url: "<?php echo base_url('admin/pengujian/import_file') ?>",
        method: "POST",
        denctype: "multipart/form-data",
        processData: false, // tell jQuery not to process the data
        contentType: false,
        data: formdata,
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


function edit_show_pengujian(id) {
    $.ajax({
        url: "<?php echo base_url('admin/pengujian/edit_show') ?>",
        method: "POST",
        data: {
            id: id,
        },
        dataType: "json",
        success: function(data) {
            $("#my-modal-edit").modal("show");
            $("#id_update").val(id);
            $("#jenis_pengujian_update").val(data.pengujian);
            $("#harga_update").val(data.harga);
        }
    });
}

function update_data_pengujian() {
    var jenis_pengujian = $("#jenis_pengujian_update").val();
    var harga = $("#harga_update").val();
    var id = $("#id_update").val();
    $.ajax({
        url: "<?php echo base_url('admin/pengujian/update') ?>",
        method: "POST",
        data: {
            pengujian: jenis_pengujian,
            harga: harga,
            id: id,
        },
        dataType: "json",
        success: function(data) {
            if (data.status == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data berhasil Diubah !'
                });
                document.location.reload();
            }
        }
    });
}

function delete_data_pengujian(id, pengujian) {
    Swal.fire({
        title: 'Yakin Apakan Anda ingin Menghapus Data ini  ?',
        text: "Data Berita " + pengujian + " Akan dihapus !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data !',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?php echo base_url('admin/pengujian/delete') ?>",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(data) {
                    if (data.status == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil Dihapus !'
                        });
                        document.location.reload();
                    }
                }
            });
        }
    });
}
</script>