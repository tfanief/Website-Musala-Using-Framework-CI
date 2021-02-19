<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-mosque"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Baiturrahim BRK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if ($title == "Dashboard") : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Super Admin -->
        <?php if ($admin['id_role'] == 1) : ?>
            <?php if ($title == "Keuangan") : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url('admin/keuangan'); ?>">
                    <i class="fas fa-fw fa-file-invoice-dollar"></i>
                    <span>Keuangan</span></a>
                </li>

                <?php if ($title == "Kegiatan") : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link" href="<?= base_url('admin/kegiatan'); ?>">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Kegiatan</span></a>
                    </li>

                    <!-- Admin Keuangan -->
                <?php elseif ($admin['id_role'] == 2) : ?>
                    <?php if ($title == "Keuangan") : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url('admin/keuangan'); ?>">
                            <i class="fas fa-fw fa-file-invoice-dollar"></i>
                            <span>Keuangan</span></a>
                        </li>

                        <!-- Admin Kegiatan -->
                    <?php elseif ($admin['id_role'] == 4) : ?>
                        <?php if ($title == "Kegiatan") : ?>
                            <li class="nav-item active">
                            <?php else : ?>
                            <li class="nav-item">
                            <?php endif; ?>
                            <a class="nav-link" href="<?= base_url('admin/kegiatan'); ?>">
                                <i class="fas fa-fw fa-newspaper"></i>
                                <span>Kegiatan</span></a>
                            </li>
                        <?php endif; ?>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Nav Item - Logout  -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                <span>Logout</span></a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>

</ul>
<!-- End of Sidebar -->