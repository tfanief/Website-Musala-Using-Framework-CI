<div class="container-fluid">

    <!-- Content Row 1 -->
    <div class="row">

        <!-- Card 1 1 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemasukan Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($keuanganbulan['pemasukan_keuangan'], 0, ',', '.'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-user-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 1 2 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengeluaran Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($keuanganbulan['pengeluaran_keuangan'], 0, ',', '.'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 1 3 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pemasukan Tahun Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($keuangantahun['pemasukan_keuangan'], 0, ',', '.'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 1 4 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengeluaran Tahun Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($keuangantahun['pengeluaran_keuangan'], 0, ',', '.'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 1 5 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Kas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($totalkeuangan['pemasukan_keuangan'] - $totalkeuangan['pengeluaran_keuangan'], 0, ',', '.') ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Keuangan</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahPemasukanModal">Tambah Pemasukan</a>
            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#tambahPengeluaranModal">Tambah Pengeluaran</a> <br><br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabelkeuangan" width="100%" cellspacing="0">
                    <thead class="bg-primary text-center text-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Keuangan</th>
                            <th scope="col">Tanggal Pemasukan/Pengeluaran</th>
                            <th scope="col">Jumlah Pemasukan</th>
                            <th scope="col">Jumlah Pengeluaran</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Total Keuangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center text-dark">
                        <?php $no = 1; ?>
                        <?php $awal = 0;
                        $total = 0; ?>
                        <?php foreach ($keuangan as $k) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $k['jenis_keuangan'] ?></td>
                                <td> <?= date('d-F-Y', strtotime($k['tanggal_keuangan'])) ?></td>
                                <td>Rp<?= number_format($k['pemasukan_keuangan'], 0, ',', '.') ?></td>
                                <td>Rp<?= number_format($k['pengeluaran_keuangan'], 0, ',', '.') ?></td>
                                <td><?= $k['keterangan'] ?></td>
                                <?php $total = $awal + $k['pemasukan_keuangan'] - $k['pengeluaran_keuangan'] ?>
                                <?php $awal = $total ?>
                                <td>Rp<?= number_format($total, 0, ',', '.') ?></td>
                                <td>
                                    <a href="" class="badge badge-pill badge-primary" data-toggle="modal" data-target="#editKeuanganModal<?= $k['id_keuangan']; ?>">Edit</a>
                                    <a href="<?= base_url('admin/hapus_keuangan/' . $k['id_keuangan']); ?>" class="badge badge-pill badge-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pemasukan -->
<div class="modal fade" id="tambahPemasukanModal" tabindex="-1" role="dialog" aria-labelledby="tambahPemasukanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPemasukanModalLabel">Tambah Keuangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/keuangan'); ?>" method="post">
                <div class="modal-body">
                    <?= form_error('jenis_keuangan', ' <p class="text-danger">', '</p>'); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jenis_keuangan" name="jenis_keuangan" placeholder="Jenis Keuangan">
                    </div>
                    Tanggal Pemasukan
                    <?= form_error('tanggal_keuangan', ' <p class="text-danger">', '</p>'); ?>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tanggal_keuangan" name="tanggal_keuangan" placeholder="Tanggal Pemasukan">
                    </div>
                    <?= form_error('pemasukan_keuangan', ' <p class="text-danger">', '</p>'); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pemasukan_keuangan" name="pemasukan_keuangan" placeholder="Jumlah Pemasukan">
                    </div>
                    <?= form_error('pengeluaran_keuangan', ' <p class="text-danger">', '</p>'); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pengeluaran_keuangan" name="pengeluaran_keuangan" value="0" readonly hidden>
                    </div>
                    <?= form_error('keterangan', ' <p class="text-danger">', '</p>'); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tambah Pengeluaran -->
<div class="modal fade" id="tambahPengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="tambahPengeluaranModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPengeluaranModal">Tambah Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/keuangan'); ?>" method="post">
                <div class="modal-body">
                    <?= form_error('jenis_keuangan', ' <p class="text-danger">', '</p>'); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jenis_keuangan" name="jenis_keuangan" placeholder="Jenis Keuangan">
                    </div>
                    Tanggal Pengeluaran
                    <?= form_error('tanggal_keuangan', ' <p class="text-danger">', '</p>'); ?>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tanggal_keuangan" name="tanggal_keuangan" placeholder="Tanggal Pengeluaran">
                    </div>
                    <?= form_error('pemasukan_keuangan', ' <p class="text-danger">', '</p>'); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pemasukan_keuangan" name="pemasukan_keuangan" value="0" readonly hidden>
                    </div>
                    <?= form_error('pengeluaran_keuangan', ' <p class="text-danger">', '</p>'); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pengeluaran_keuangan" name="pengeluaran_keuangan" placeholder="Jumlah Pengeluaran">
                    </div>
                    <?= form_error('keterangan', ' <p class="text-danger">', '</p>'); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Keuangan -->
<?php foreach ($keuangan as $d) : ?>
    <div class="modal fade" id="editKeuanganModal<?= $d['id_keuangan']; ?>" tabindex="-1" role="dialog" aria-labelledby="editKeuanganModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKeuanganModalLabel">Edit Data Keuangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/edit_keuangan'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_keuangan" value="<?= $d['id_keuangan'] ?>">
                        <?= form_error('jenis_keuangan', ' <p class="text-danger">', '</p>'); ?>
                        <div class="form-group">
                            <h7>Jenis Keuangan: </h7><input type="text" class="form-control" id="jenis_keuangan" name="jenis_keuangan" placeholder="Jenis Keuangan" value="<?= $d['jenis_keuangan'] ?>">
                        </div>
                        <?= form_error('tanggal_keuangan', ' <p class="text-danger">', '</p>'); ?>
                        <div class="form-group">
                            <h7>Tanggal Pemasukan/Pengeluaran: </h7><input type="date" class="form-control" id="tanggal_keuangan" name="tanggal_keuangan" placeholder="Tanggal Pemasukan/Pengeluaran" value="<?= $d['tanggal_keuangan'] ?>">
                        </div>
                        <?= form_error('pemasukan_keuangan', ' <p class="text-danger">', '</p>'); ?>
                        <div class="form-group">
                            <h7>Jumlah Pemasukan: </h7><input type="text" class="form-control" id="pemasukan_keuangan" name="pemasukan_keuangan" placeholder="Jumlah Pemasukan" value="<?= $d['pemasukan_keuangan'] ?>">
                        </div>
                        <?= form_error('pengeluaran_keuangan', ' <p class="text-danger">', '</p>'); ?>
                        <div class="form-group">
                            <h7>Jumlah Pengeluaran: </h7><input type="text" class="form-control" id="pengeluaran_keuangan" name="pengeluaran_keuangan" placeholder="Jumlah Pengeluaran" value="<?= $d['pengeluaran_keuangan'] ?>">
                        </div>
                        <?= form_error('keterangan', ' <p class="text-danger">', '</p>'); ?>
                        <div class="form-group">
                            <h7>Keterangan: </h7><input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?= $d['keterangan'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>