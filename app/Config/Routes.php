<?php

namespace Config;

use App\Controllers\AdminController;
use App\Controllers\Auth;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('admin', static function ($routes) {
    $routes->group('', ['filter' => 'cifilter:auth'], static function ($routes) {
        $routes->get('home', 'Home::index', ['as' => 'admin.home']);
        $routes->get('logout', 'Auth::logoutHandler', ['as' => 'admin.logout']);

        $routes->get('jurusan', 'Admin\Jurusan::index', ['as' => 'jurusan']);
        $routes->get('jurusan/create', 'Admin\Jurusan::create', ['as' => 'jurusan.create']);
        $routes->post('jurusan/store', 'Admin\Jurusan::store', ['as' => 'jurusan.store']);
        $routes->post('jurusan/update/(:segment)', 'Admin\Jurusan::update/$1', ['as' => 'jurusan.update']);
        $routes->get('jurusan/delete/(:segment)', 'Admin\Jurusan::delete/$1', ['as' => 'jurusan.delete']);
        $routes->get('jurusan/trash', 'Admin\Jurusan::trash', ['as' => 'jurusan.trash']);
        $routes->get('jurusan/restore/(:any)', 'Admin\Jurusan::restore/$1', ['as' => 'jurusan.restore']);
        $routes->get('jurusan/restore', 'Admin\Jurusan::restore', ['as' => 'jurusan.restore']);
        $routes->post('jurusan/delete2/(:num)', 'Admin\Jurusan::delete2/$1', ['as' => 'jurusan.delete']);
        $routes->post('jurusan/delete2', 'Admin\Jurusan::delete2', ['as' => 'jurusan.delete']);

        $routes->get('guru', 'Admin\Guru::index', ['as' => 'guru']);
        $routes->get('guru/create', 'Admin\Guru::create', ['as' => 'guru.create']);
        $routes->post('guru/store', 'Admin\Guru::store', ['as' => 'guru.store']);
        $routes->post('guru/update/(:segment)', 'Admin\Guru::update/$1', ['as' => 'guru.update']);
        $routes->get('guru/delete/(:segment)', 'Admin\Guru::delete/$1', ['as' => 'guru.delete']);
        $routes->get('guru/trash', 'Admin\Guru::trash', ['as' => 'guru.trash']);
        $routes->get('guru/restore/(:any)', 'Admin\Guru::restore/$1', ['as' => 'guru.restore']);
        $routes->get('guru/restore', 'Admin\Guru::restore', ['as' => 'guru.restore']);
        $routes->post('guru/delete2/(:num)', 'Admin\Guru::delete2/$1', ['as' => 'guru.delete']);
        $routes->post('guru/delete2', 'Admin\Guru::delete2', ['as' => 'guru.delete']);

        $routes->get('kelas', 'Admin\Kelas::index', ['as' => 'kelas']);
        $routes->get('kelas/create', 'Admin\Kelas::create', ['as' => 'kelas.create']);
        $routes->post('kelas/store', 'Admin\Kelas::store', ['as' => 'kelas.store']);
        $routes->post('kelas/update/(:segment)', 'Admin\Kelas::update/$1', ['as' => 'kelas.update']);
        $routes->get('kelas/delete/(:segment)', 'Admin\Kelas::delete/$1', ['as' => 'kelas.delete']);

        $routes->get('lokasipresensi', 'Admin\LokasiPresensi::index', ['as' => 'lokasipresensi']);
        $routes->get('lokasipresensi/create', 'Admin\LokasiPresensi::create', ['as' => 'lokasipresensi.create']);
        $routes->post('lokasipresensi/store', 'Admin\LokasiPresensi::store', ['as' => 'lokasipresensi.store']);
        $routes->get('lokasipresensi/detail/(:segment)', 'Admin\LokasiPresensi::detail/$1', ['as' => 'lokasipresensi.detail']);
        $routes->get('lokasipresensi/edit/(:segment)', 'Admin\LokasiPresensi::edit/$1', ['as' => 'lokasipresensi.edit']);
        $routes->post('lokasipresensi/update/(:segment)', 'Admin\LokasiPresensi::update/$1', ['as' => 'lokasipresensi.update']);
        $routes->get('lokasipresensi/delete/(:segment)', 'Admin\LokasiPresensi::delete/$1', ['as' => 'lokasipresensi.delete']);
        $routes->get('lokasipresensi/trash', 'Admin\LokasiPresensi::trash', ['as' => 'lokasipresensi.trash']);
        $routes->get('lokasipresensi/restore/(:any)', 'Admin\LokasiPresensi::restore/$1', ['as' => 'lokasipresensi.restore']);
        $routes->get('lokasipresensi/restore', 'Admin\LokasiPresensi::restore', ['as' => 'lokasipresensi.restore']);
        $routes->post('lokasipresensi/delete2/(:num)', 'Admin\LokasiPresensi::delete2/$1', ['as' => 'lokasipresensi.delete']);
        $routes->post('lokasipresensi/delete2', 'Admin\LokasiPresensi::delete2', ['as' => 'lokasipresensi.delete']);

        $routes->get('rekap_harian', 'Admin\RekapPresensi::rekap_harian');
        $routes->get('rekap_bulanan', 'Admin\RekapPresensi::rekap_bulanan');

        $routes->get('profile', 'Admin\Profile::index', ['as' => 'profile']);
        $routes->get('profile/create', 'Admin\Profile::create', ['as' => 'profile.create']);
        $routes->post('profile/store', 'Admin\Profile::store', ['as' => 'profile.store']);
        $routes->post('profile/update/(:segment)', 'Admin\Profile::update/$1', ['as' => 'profile.update']);
        $routes->get('profile/delete/(:segment)', 'Admin\Profile::delete/$1', ['as' => 'profile.delete']);

        $routes->get('settings', 'Admin\Settings::index', ['as' => 'settings']);
        $routes->get('settings/create', 'Admin\Settings::create', ['as' => 'settings.create']);
        $routes->post('settings/store', 'Admin\Settings::store', ['as' => 'settings.store']);
        $routes->post('settings/update/(:segment)', 'Admin\Settings::update/$1', ['as' => 'settings.update']);
        $routes->get('settings/delete/(:segment)', 'Admin\Settings::delete/$1', ['as' => 'settings.delete']);

        // $routes->post('update-personal-details', 'AdminController::updatePersonalDetails', ['as' => 'update-personal-details']);
        // $routes->post('update-profile-picture', 'AdminController::updateProfilePicture', ['as' => 'update-profile-picture']);
        // $routes->post('change-password', 'AdminController::changePassword', ['as' => 'change-password']);
        // $routes->post('update-general-settings', 'AdminController::updateGeneralSettings', ['as' => 'update-general-settings']);
        // $routes->post('update-blog-logo', 'AdminController::updateBlogLogo', ['as' => 'update-blog-logo']);
        // $routes->post('update-blog-favicon', 'AdminController::updateBlogFavicon', ['as' => 'update-blog-favicon']);
    });

    $routes->group('', ['filter' => 'cifilter:guest'], static function ($routes) {
        $routes->get('login', 'Auth::loginForm', ['as' => 'admin.login.form']);
        $routes->post('login', 'Auth::loginHandler', ['as' => 'admin.login.handler']);
        $routes->get('forgot-password', 'Auth::forgotForm', ['as' => 'admin.forgot.form']);
        $routes->post('send-password-reset-link', 'Auth::sendPasswordResetLink', ['as' => 'send_password_reset_link']);
        $routes->get('password/reset/(:any)', 'Auth::resetPassword/$1', ['as' => 'admin.reset-password']);
        $routes->post('reset-password-handler/(:any)', 'Auth::resetPasswordHandler/$1', ['as' => 'reset-password-handler']);
    });
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
