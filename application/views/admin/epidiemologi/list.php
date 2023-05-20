<p class="btn-group">
    <button class="btn btn-success btn-lg" type="button" onclick="tambah_epidiomologi()">
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
                <th>No.Epidiomologi</th>
                <th>Status</th>
                <th>Redirect Link</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($dataepidomologi as $row) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td>
                    <div class="button-group">
                        <button class="btn btn-md btn-warning" type="button"
                            onclick="edit_epidiemologi('<?php echo $row->id; ?>')">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-md btn-danger" type="button"
                            onclick="hapus_epidiemologi('<?php echo $row->id; ?>', '<?php echo $row->epidomologi; ?>')">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </div>
                </td>
                <td><?php echo $row->epidomologi; ?></td>
                <td><?php echo $row->status; ?></td>
                <td><?php echo $row->link; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<!-- modal tambah -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="my-modal-title">Tambah Data Epidomologi</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="post" id="insert_epidomologi">
                            <div class="form-group">
                                <label for="">No.Epidomologi</label>
                                <input type="text" name="no_epidomologi" id="no_epidomologi" class="form-control"
                                    placeholder="Masukkan Kode epidomologi">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <input type="text" name="status" id="status" class="form-control"
                                    placeholder="Masukkan Stattus">
                            </div>
                            <div class="form-group">
                                <label for="">URL Link</label>
                                <input type="text" name="url_link" id="url_link" class="form-control"
                                    placeholder="url link">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-md btn-primary">
                    <i class="fa fa-save"></i>
                    Simpan Data
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Import Data -->
<div id="my-modal-import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="my-modal-title">Import Data</h5>
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
                <button class="btn btn-md btn-primary" type="button" onclick="simpan_import()">
                    <i class="fa fa-save"></i>
                    Simpan Data
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Import -->

<!-- Modal Edit -->
<div id="my-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white" id="my-modal-title">Update Data Epidomologi</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="post" id="ubah_epidomologi">
                            <div class="form-group">
                                <input type="hidden" name="id_update" id="id_update" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No.Epidomologi</label>
                                <input type="text" name="no_epidomologi_update" id="no_epidomologi_update"
                                    class="form-control" placeholder="Masukkan Kode epidomologi">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <input type="text" name="status_update" id="status_update" class="form-control"
                                    placeholder="Masukkan Stattus">
                            </div>
                            <div class="form-group">
                                <label for="">URL Link</label>
                                <input type="text" name="url_link_update" id="url_link_update" class="form-control"
                                    placeholder="url link">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-md btn-warning" type="button" onclick="update_data()">
                    <i class="fa fa-edit"></i>
                    Update Data
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit -->



<!-- script -->
<script>
function tambah_epidiomologi() {
    $("#my-modal").modal("show");
}

function import_epidiomologi() {
    $("#my-modal-import").modal("show");
}


function simpan_import() {
    var formupload = document.getElementById("import-file");
    var formdata = new FormData(formupload);
    $.ajax({
        url: "<?php echo base_url('admin/Epidiemologi/import_file') ?>",
        method: "POST",
        denctype: "multipart/form-data",
        processData: false, // tell jQuery not to process the data
        contentType: false,
        data: formdata,
        dataType: "JSON",
        success: function(data) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data berhasil disimpan!'
            });
            document.location.reload();
        }
    });
}

function edit_epidiemologi(id) {
    $.ajax({
        url: "<?php echo base_url('admin/epidiemologi/show_edit') ?>",
        method: "POST",
        data: {
            id: id,
        },
        dataType: "JSON",
        success: function(data) {
            $("#id_update").val(id);
            $("#no_epidomologi_update").val(data.epidiemologi);
            $("#status_update").val(data.status);
            $("#url_link_update").val(data.link);

            $("#my-modal-edit").modal("show");
        }
    });
}

function update_data() {
    var id = $("#id_update").val();
    var no_epidiemologi = $("#no_epidomologi_update").val();
    var status = $("#status_update").val();
    var link = $("#link_update").val();
    $.ajax({
        url: "<?php echo base_url('admin/epidiemologi/update_data') ?>",
        method: "POST",
        data: {
            id: id,
            no_epidiemologi: no_epidiemologi,
            status: status,
            link: link,
        },
        dataType: "JSON",
        success: function(data) {
            if (data.status == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data berhasil Diubah!'
                });
                document.location.reload();
            }
        }
    });
}

function hapus_epidiemologi(id, epidiemologi) {
    Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Anda Akan Menghapus Data Epidiemologi " + epidiemologi + " !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data !',
        cancelButtonText: 'Tidak, Batalkan !'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?php echo base_url('admin/epidiemologi/delete') ?>",
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