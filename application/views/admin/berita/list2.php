<?php
$site   = $this->konfigurasi_model->listing();
echo form_open(base_url('admin/berita/proses'));
?>
<p class="btn-group">
    <a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah Berita</a>
    <?php
    $url_navigasi = $this->uri->segment(2);
    if ($this->uri->segment(3) != "") {
    ?>
    <a href="<?php echo base_url('admin/' . $url_navigasi) ?>" class="btn btn-primary">
        <i class="fa fa-backward"></i> Kembali</a>
    <?php } ?>
</p>
<div class="table-responsive mailbox-messages">
    <table id="example1" class="display table table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="5%">
                    NO
                </th>
                <th width="10%">GAMBAR</th>
                <th width="35%">JUDUL</th>
                <th width="15%">KATEGORI</th>
                <th width="15%">ACTION</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1;
            foreach ($berita as $row) { ?>

            <tr class="odd gradeX">
                <td>
                    <?= $i++; ?>
                </td>
                <td>
                    <img src="<?php echo base_url() ?>assets/upload/berita/<?= $row->file_img; ?>"
                        class="img img-thumbnail img-responsive" width="60">
                </td>
                <td>
                    <h5><?= $row->judul; ?></h5>
                    <small>
                        <br>Posted: <?php echo date('d M Y H:i: s', strtotime($row->created_at)) ?>
                        <br>Sumber: <?php echo $row->sumber ?>
                        <br>penulis: <i class="<?php echo $row->penulis ?>">
                    </small>
                </td>
                <td>
                    <span><?php echo $row->kategori ?></span>
                </td>

                <td>
                    <div class="btn-group">
                        <a href="<?php echo base_url('berita/reader/' . $row->slug) ?>" class="btn btn-success btn-xs"
                            target="_blank"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-danger btn-xs"
                            onclick="DeleteBeritaNew('<?php echo $row->id ?>', '<?php echo $row->judul ?>')"><i
                                class="fa fa-trash-o"></i></a>
                    </div>
                </td>
            </tr>

            <?php $i++;
            } ?>

        </tbody>
    </table>
</div>
<?php echo form_close(); ?>

<script>
function DeleteBeritaNew(id, judul) {
    Swal.fire({
        title: 'Yakin Apakan Anda ingin Menghapus Data ini Berita ini ?',
        text: "Data Berita Dengan Judul " + judul + " Akan dihapus !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data !',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?php echo base_url('admin/berita/delete_new') ?>",
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
                            text: 'Data berhasil disimpan!'
                        });
                        document.location.reload();
                    }
                }
            });
        }
    });
}
</script>