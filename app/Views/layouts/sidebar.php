<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Presensi Siswa</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PS</a>
        </div>
        <ul class="sidebar-menu">
            <?php if (get_user()->role == 'Admin') : ?>
                <li class="menu-header">Main</li>
                <li class="nav-item <?= $title === 'Dashboard' ? 'active' : '' ?>"><a href="<?= route_to('admin.home') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
                <li class="menu-header">Data Master</li>
                <li class="nav-item dropdown <?= $title === 'Data Jurusan' || $title === 'Jurusan Trash' || $title === 'Data Guru' || $title === 'Guru Trash' || $title === 'Data Kelas' || $title === 'Kelas Trash' || $title === 'Data Lokasi Presensi' || $title === 'Detail Data Lokasi Presensi' || $title === 'Tambah Data Lokasi Presensi' || $title === 'Edit Data Lokasi Presensi' || $title === 'Data Siswa' || $title === 'Detail Siswa' || $title === 'Tambah Data Siswa' || $title === 'Edit Data Siswa' || $title === 'Detail Lokasi Presensi' || $title === 'Lokasi Presensi Trash' ? 'active' : '' ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Master Data</span></a>
                    <ul class="dropdown-menu">
                        <li class="<?= $title === 'Data Jurusan' || $title === 'Jurusan Trash' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('jurusan') ?>">Data Jurusan</a></li>
                        <li class="<?= $title === 'Data Guru' || $title === 'Guru Trash' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('guru') ?>">Data Guru</a></li>
                        <li class="<?= $title === 'Data Kelas' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('kelas') ?>">Data Kelas</a></li>
                        <li class="<?= $title === 'Data Siswa' || $title === 'Detail Siswa' || $title === 'Tambah Data Siswa' || $title === 'Edit Data Siswa' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('siswa') ?>">Data Siswa</a></li>
                        <li class="<?= $title === 'Data Lokasi Presensi' || $title === 'Detail Lokasi Presensi' || $title === 'Tambah Data Lokasi Presensi' || $title === 'Edit Data Lokasi Presensi' || $title === 'Lokasi Presensi Trash' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('lokasipresensi') ?>">Data Lokasi Presensi</a></li>
                    </ul>
                </li>
                <li class="nav item <?= $title === 'Ketidakhadiran' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('ketidakhadiran') ?>"><i class="fas fa-user-xmark"></i> <span>Ketidakhadiran</span></a></li>
                <li class="nav-item dropdown <?= $title === 'Rekap Harian' || $title === 'Rekap Bulanan' ? 'active' : '' ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i> <span>Rekap Laporan</span></a>
                    <ul class="dropdown-menu">
                        <li class="<?= $title === 'Rekap Harian' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('rekapharian') ?>">Rekap Harian</a></li>
                        <li class="<?= $title === 'Rekap Bulanan' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('rekapbulanan') ?>">Rekap Bulanan</a></li>
                    </ul>
                </li>
                <li class="menu-header">Ekstra</li>
                <li class="nav-item <?= $title === 'Profil Pengguna' ? 'active' : '' ?>"><a href="<?= route_to('profile') ?>" class="nav-link"><i class="fas fa-user"></i> <span>Profil Pengguna</span></a></li>
                <li class="nav-item <?= $title === 'Pengaturan' ? 'active' : '' ?>"><a href="<?= route_to('settings') ?>" class="nav-link"><i class="fas fa-gear"></i> <span>Pengaturan</span></a></li>
                <li><a href="<?= route_to('logout') ?>" class="nav-link"><i class="fas fa-right-from-bracket text-danger tombol-logout"></i> <span>Logout</span></a></li>
            <?php elseif (get_user()->role ==  'Siswa') : ?>
                <li class="menu-header">Main</li>
                <li class="nav-item <?= $title === 'Dashboard' ? 'active' : '' ?>"><a href="<?= route_to('siswa.home') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
                <li class="nav item <?= $title === 'Ketidakhadiran' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('siswa.ketidakhadiran') ?>"><i class="fas fa-user-xmark"></i> <span>Ketidakhadiran</span></a></li>
                <li class="nav item <?= $title === 'Rekap Presensi' ? 'active' : '' ?>"><a class="nav-link" href="<?= route_to('siswa.rekappresensi') ?>"><i class="fas fa-newspaper"></i> <span>Rekap Presensi</span></a></li>
                <li class="menu-header">Ekstra</li>
                <li class="nav-item <?= $title === 'Profil Pengguna' ? 'active' : '' ?>"><a href="<?= route_to('siswa.profile') ?>" class="nav-link"><i class="fas fa-user"></i> <span>Profil Pengguna</span></a></li>
                <li><a href="<?= route_to('logout') ?>" class="nav-link"><i class="fas fa-right-from-bracket text-danger tombol-logout"></i> <span>Logout</span></a></li>
            <?php endif ?>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Dokumentasi
            </a>
        </div>
    </aside>
</div>