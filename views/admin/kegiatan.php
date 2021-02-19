<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kegiatan</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('admin/tambahKegiatan') ?>" class="btn btn-primary">Tambah Kegiatan</a> <br><br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabelkegiatan" width="100%" cellspacing="0">
                    <thead class="bg-primary text-center text-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Kegiatan</th>
                            <th scope="col">Nama Ustadz</th>
                            <th scope="col">Tanggal Kegiatan</th>
                            <th scope="col">Waktu Kegiatan</th>
                            <th scope="col">Tanggal Post</th>
                            <th scope="col">Judul Kegiatan</th>
                            <th scope="col">Tempat Kegiatan</th>
                            <th scope="col">Image</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center text-dark">
                        <?php $no = 1; ?>
                        <?php foreach ($kegiatan as $k) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $k['jenis_kegiatan'] ?></td>
                                <td><?= $k['ustadz_kegiatan'] ?></td>
                                <td><?= date('d F Y', strtotime($k['tanggal_kegiatan'])) ?></td>
                                <td><?= time('HH:MM', strtotime($k['waktu_kegiatan'])) ?></td>
                                <td><?= date('d F Y', strtotime($k['tanggal_post'])) ?></td>
                                <td><?= $k['judul_kegiatan'] ?></td>
                                <td><?= $k['lokasi_kegiatan'] ?></td>
                                <td><img src="<?= base_url('assets/img/kegiatan/') . $k['image'] ?>" width="120px" height="100px" data-toggle="modal" data-target="#editIMGModal<?= $k['id_kegiatan']; ?>"></td>
                                <td>
                                    <a href="<?= base_url('admin/detail_kegiatan/' . $k['id_kegiatan']) ?>" class="badge badge-pill badge-warning">Detail</a>
                                    <a href="<?= base_url('admin/edit_kegiatan/' . $k['id_kegiatan']) ?>" class="badge badge-pill badge-primary">Edit</a>
                                    <a href="<?= base_url('admin/hapus_kegiatan/' . $k['id_kegiatan']); ?>" class="badge badge-pill badge-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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