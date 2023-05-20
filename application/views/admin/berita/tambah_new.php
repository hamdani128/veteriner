<div class="row">
    <div class="col-md-12">
        <form action="#" method="post" enctype="multipart/form-data" id="insert_berita_new_form">

            <div class="form-group">
                <label for="">Kategori Berita</label>
                <select class="form-control" name="cmb_kategori" id="cmb_kategori">
                    <option value="">Pilih Kategori Berita</option>
                    <?php if (count($kategori) > 0) { ?>
                    <?php foreach ($kategori as $row) { ?>
                    <option value="<?= $row->nama_kategori; ?>"><?= $row->nama_kategori; ?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Gambar Utama</label>
                <input type="file" name="file_img" id="file_img" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Judul Berita</label>
                <textarea rows="3" cols="3" class="form-control" name="judul_berita" id="judul_berita"></textarea>
            </div>

            <div class="form-group">
                <label for="">Detail Berita</label>
                <textarea id="summernote"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-md btn-dark" type="button" onclick="add_row()">
                    <i class="fa fa-plus"></i>
                    Tambah Detail Body Image
                </button>
                <div id="container"></div>
            </div>

            <div class="form-group">
                <label for="">Lanjutan Berita</label>
                <textarea id="summernote2"></textarea>
            </div>

            <div class="form-group">
                <label for="">Sumber</label>
                <input type="text" name="sumber" id="sumber" class="form-control"
                    placeholder="Masukkan Sumber Referensi">
            </div>
            <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Masukkan Penulis">
            </div>
            <!-- <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" placeholder="Masukkan Slug">
            </div> -->
        </form>
    </div>
</div>

<div class="row pt-3">
    <div class="col-md-4">
        <button class="btn btn-md btn-primary" type="button" onclick="simpan_data_berita()">
            <i class="fa fa-plus"></i>
            Simpan Data
        </button>
    </div>
</div>


<script>
$(document).ready(function() {
    $('#summernote').summernote();
    $('#summernote2').summernote();
});

function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost' || location.host == '10.32.18.206') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

function add_row() {
    var container = document.getElementById("container");
    var newRow = document.createElement("div");
    newRow.className = "pt-4";

    var newImage = document.createElement("input");
    newImage.type = "file";
    newImage.className = "form-control";
    newImage.name = "image[]";
    var newText = document.createElement("textarea");
    newText.className = "form-control pt-2";
    newText.name = "text[]";
    newText.placeholder = "Masukkan Text Content Tambahan";
    var newButton = document.createElement("button");
    newButton.type = "button";
    newButton.className = "btn btn-danger mt-3";
    newButton.innerHTML = "Hapus Baris";
    newButton.addEventListener("click", function() {
        container.removeChild(newRow);
    });
    newRow.appendChild(newImage);
    newRow.appendChild(newText);
    newRow.appendChild(newButton);
    container.appendChild(newRow);
}


function simpan_data_berita() {
    if ($("#container").children().length > 0) {
        $("#container").children().each(function() {
            var imgInput = $(this).find('input[type="file"]');
            var img = imgInput[0].files[0];
            var keterangan = $(this).find('textarea').val();
            var formData = new FormData();
            formData.append('file_img', img);
            formData.append('keterangan', keterangan);
            $.ajax({
                url: base_url('admin/berita/insert_berita_detail'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    insert_berita();
                },
            });
        });
    } else {
        insert_berita();
    }
}

function insert_berita() {
    var formupload = document.getElementById("insert_berita_new_form");
    var formData = new FormData(formupload);
    var summernoteValue = $('#summernote').summernote('code');
    var summernoteValue2 = $('#summernote2').summernote('code');
    var file_img = document.getElementById("file_img").files.lenght;
    formData.append("summernote", summernoteValue);
    formData.append("summernote2", summernoteValue2);

    $.ajax({
        url: base_url('admin/berita/insert_berita_new'),
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(data) {
            if (data.status == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Di Simpan !'
                });
                document.location.href = base_url('admin/berita');
            }
        },
    });
}
</script>