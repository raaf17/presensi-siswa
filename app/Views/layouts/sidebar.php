<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Presensi Siswa</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="nav-item <?= $title === 'Dashboard' ? 'active' : '' ?>"><a href="<?= site_url('admin/home') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
            <li class="menu-header">Data Master</li>
            <li class="nav-item dropdown <?= $title === 'Data Jurusan' || $title === 'Jurusan Trash' || $title === 'Data Guru' || $title === 'Guru Trash' || $title === 'Data Kelas' || $title === 'Kelas Trash' || $title === 'Data Lokasi Presensi' || $title === 'Detail Data Lokasi Presensi' || $title === 'Tambah Data Lokasi Presensi' || $title === 'Edit Data Lokasi Presensi' ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= $title === 'Data Jurusan' || $title === 'Jurusan Trash' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('admin/jurusan') ?>">Data Jurusan</a></li>
                    <li class="<?= $title === 'Data Guru' || $title === 'Guru Trash' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('admin/guru') ?>">Data Guru</a></li>
                    <li class="<?= $title === 'Data Kelas' || $title === 'Kelas Trash' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('admin/kelas') ?>">Data Kelas</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Siswa</a></li>
                    <li class="<?= $title === 'Data Lokasi Presensi' || $title === 'Detail Lokasi Presensi' || $title === 'Tambah Data Lokasi Presensi' || $title === 'Edit Data Lokasi Presensi' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('admin/lokasipresensi') ?>">Data Lokasi Presensi</a></li>
                </ul>
            </li>
            <li class="nav item <?= $title === 'Ketidakhadiran' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('admin/ketidakhadiran') ?>"><i class="fas fa-user-xmark"></i> <span>Ketidakhadiran</span></a></li>
            <li class="nav-item dropdown <?= $title === 'Rekap Harian' || $title === 'Rekap Bulanan' ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i> <span>Rekap Laporan</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= $title === 'Rekap Harian' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('admin/rekap_harian') ?>">Rekap Harian</a></li>
                    <li class="<?= $title === 'Rekap Bulanan' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('admin/rekap_bulanan') ?>">Rekap Bulanan</a></li>
                </ul>
            </li>
            <li class="menu-header">Ekstra</li>
            <li class="nav-item <?= $title === 'Profil Pengguna' ? 'active' : '' ?>"><a href="<?= site_url('admin/profile') ?>" class="nav-link"><i class="fas fa-user"></i> <span>Profil Pengguna</span></a></li>
            <li class="nav-item <?= $title === 'Pengaturan' ? 'active' : '' ?>"><a href="<?= site_url('admin/settings') ?>" class="nav-link"><i class="fas fa-gear"></i> <span>Pengaturan</span></a></li>
            <li><a href="#" class="nav-link"><i class="fas fa-right-from-bracket text-danger"></i> <span>Logout</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Dokumentasi
            </a>
        </div>
    </aside>
</div>