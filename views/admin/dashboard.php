    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <!-- Content Row 1 -->
        <div class="row">

            <!-- Card 1 1 -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan Bulan Ini</div>
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
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan Tahun Ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($keuangantahun['pemasukan_keuangan'], 0, ',', '.'); ?></div>
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
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pendapatan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-dollar-sign fa-2x text-gray-300"></i>
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
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sisa Kas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($totalkeuangan['pemasukan_keuangan'] - $totalkeuangan['pengeluaran_keuangan'], 0, ',', '.'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row 2 -->
        <div class="row">

            <!-- Card 2 1 -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengeluaran Bulan Ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($keuanganbulan['pengeluaran_keuangan'], 0, ',', '.'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-user-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 2 -->
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

            <!-- Card 2 3 -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengeluaran</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($keuangantahun['pemasukan_keuangan'], 0, ',', '.'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 3 -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Kegiatan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($kegiatan); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->