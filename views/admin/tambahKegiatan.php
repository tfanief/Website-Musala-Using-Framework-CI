<script src="<?= base_url('assets/vendor/'); ?>ckeditor/ckeditor.js"></script>
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Kegiatan</h6>

        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/tambahKegiatan'); ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="jenis_kegiatan">Jenis Kegiatan</label>
                            <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Masukkan Jenis Kegiatan">
                            <?= form_error('jenis_kegiatan', ' <p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="col">
                            <label for="ustadz_kegiatan">Nama Ustadz</label>
                            <input type="text" class="form-control" id="ustadz_kegiatan" name="ustadz_kegiatan" placeholder="Masukkan Nama Ustadz">
                            <?= form_error('ustadz_kegiatan', ' <p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                            <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan">
                            <?= form_error('tanggal_kegiatan', ' <p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="col">
                            <label for="waktu_kegiatan">Waktu Kegiatan</label>
                            <input type='time' class="form-control" id="waktu_kegiatan" name="waktu_kegiatan"/>   
                            <?= form_error('waktu_kegiatan', ' <p class="text-danger">', '</p>');?>
                        </div>
                        <div class="col">
                            <label for="tanggal_post">Tanggal Post</label>
                            <input type="date" class="form-control" id="tanggal_post" name="tanggal_post" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="lokasi_kegiatan">Tempat Kegiatan</label>
                            <input type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan" value="Musholla Baiturrahim"/>
                            <?= form_error('lokasi_kegiatan', ' <p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="col">
                            <label for="latitude">Latitude</label>
                            <input type='text' class="form-control" id="latitude" name="latitude" value="1.3062588"/>   
                            <?= form_error('latitude', ' <p class="text-danger">', '</p>');?>
                        </div>
                        <div class="col">
                            <label for="longitude">Longitude</label>
                            <input type='text' class="form-control" id="longitude" name="longitude" value="100.5777581"/>   
                            <?= form_error('longitude', ' <p class="text-danger">', '</p>');?>
                        </div>
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="judul_kegiatan">Judul Kegiatan</label>
                    <input type="text" class="form-control" id="judul_kegiatan" name="judul_kegiatan" placeholder="Masukkan Judul Kegiatan">
                    <?= form_error('judul_kegiatan', ' <p class="text-danger">', '</p>'); ?>
                </div>

                <div class="form-group">
                    <label for="deskripsi_kegiatan">Deskripsi Kegiatan</label>
                    <textarea class="form-control" id="deskripsi_kegiatan" name="deskripsi_kegiatan" placeholder="Deskripsi Kegiatan"></textarea>
                    <?= form_error('deskripsi_kegiatan', ' <p class="text-danger">', '</p>'); ?>
                </div>

                <!--Image -->
                <div class="form-group row">
                    <div class="col-sm-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Pilih Gambar</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    CKEDITOR.replace('deskripsi_kegiatan', {
        filebrowserImageBrowseUrl: '<?= base_url('assets/vendor/kcfinder/browse.php'); ?>',
        height: '400px'
    });
</script>

<script>
    document.getElementById("tanggal_post").valueAsDate = new Date();
</script>