<script src="<?= base_url('assets/'); ?>vendor/ckeditor/ckeditor.js"></script>
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Kegiatan</h6>
        </div>
        <div class="card-body">
            <?php foreach ($kegiatan as $k) : ?>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="jenis_kegiatan">Jenis Kegiatan</label>
                            <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Masukkan Jenis Kegiatan" value="<?= $k['jenis_kegiatan']; ?>">
                        </div>
                        <div class="col">
                            <label for="ustadz_kegiatan">Nama Ustadz</label>
                            <input type="text" class="form-control" id="ustadz_kegiatan" name="ustadz_kegiatan" placeholder="Masukkan Nama Ustadz" value="<?= $k['ustadz_kegiatan']; ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                            <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" value="<?= $k['tanggal_kegiatan']; ?>">
                        </div>
                        <div class="col">
                            <label for="tanggal_post">Tanggal Post</label>
                            <input type="date" class="form-control" id="tanggal_post" name="tanggal_post" value="<?= $k['tanggal_post']; ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="judul_kegiatan">Judul Kegiatan</label>
                    <input type="text" class="form-control" id="judul_kegiatan" name="judul_kegiatan" placeholder="Masukkan Judul Kegiatan" value="<?= $k['judul_kegiatan']; ?>">
                </div>

                <div class="form-group">
                    <label for="deskripsi_kegiatan">Deskripsi Kegiatan</label>
                    <textarea class="form-control ckeditor" id="deskripsi_kegiatan" name="deskripsi_kegiatan" placeholder="Deskripsi Kegiatan" readonly><?= $k['deskripsi_kegiatan']; ?></textarea>
                </div>

                <!--Image -->
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/kegiatan/') . $k['image']; ?>" class="img-thumbnail" style="max-width:200px; max-height:200px;" data-toggle="modal" data-target="#editIMGModal<?= $k['id_kegiatan']; ?>">
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal Foto -->
<?php foreach ($kegiatan as $k) : ?>
    <div class="modal fade" id="editIMGModal<?= $k['id_kegiatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="editIMGModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="editIMGModalLabel">Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img alt="Card image cap" class="card-img-top" src="<?= base_url('assets/img/kegiatan/') . $k['image']; ?>" />
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script type="text/javascript">
    CKEDITOR.replace('deskripsi_kegiatan');
</script>