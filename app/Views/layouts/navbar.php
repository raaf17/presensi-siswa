<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <?php if (get_user()->role) : ?>
                    <img alt="image" src="<?= get_user()->foto == null ? '/images/users/2.jpg' : '/images/users/' . get_user()->foto; ?>" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hi, <span class="text-uppercase"><?= get_user()->username; ?></span></div>
                <?php endif ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <?php if (get_user()->role == 'Admin') : ?>
                    <a href="<?= route_to('profile') ?>" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                    <a href="<?= route_to('settings') ?>" class="dropdown-item has-icon">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= route_to('logout') ?>" class="dropdown-item has-icon text-danger tombol-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                <?php elseif (get_user()->role == 'Siswa') : ?>
                    <a href="<?= route_to('profile') ?>" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= route_to('logout') ?>" class="dropdown-item has-icon text-danger tombol-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                <?php endif ?>
            </div>
        </li>
    </ul>
</nav>