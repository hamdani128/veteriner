<div class="row">
    <?php if(count($data_kategori) > 0) { ?>

    <?php foreach($data_kategori as $row){ ?>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?= $row->kategori; ?></span>
                        <span class="info-box-number"><?= $row->jumlah; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php } ?>

</div>


<!-- row baru -->
<div class="row">
    <div class="table-responsive mailbox-messages">
        <table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr class="bg-info">
                    <th>No</th>
                    <th>E-Mail</th>
                    <th>Nama Lengkap</th>
                    <th>Kategori</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach($download_register as $row){ ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->kategori; ?></td>
                    <td><?php echo $row->created_at; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>