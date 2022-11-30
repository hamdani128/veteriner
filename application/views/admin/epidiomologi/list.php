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
            <?php $no=1; ?>
            <?php foreach($dataepidomologi as $row){ ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td>
                    <div class="button-group">
                        <button class="btn btn-md btn-warning">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-md btn-danger">
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
        url: "<?php echo base_url('admin/epidiomologi/import_file') ?>",
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
</script>