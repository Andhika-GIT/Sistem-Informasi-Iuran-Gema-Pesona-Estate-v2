<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');

// routes data penduduk
$routes->get('/datapenduduk/add', 'DataPenduduk::add');
$routes->get('/datapenduduk/(:num)', 'DataPenduduk::edit/$1');
$routes->post('/datapenduduk/(:num)', 'DataPenduduk::update/$1');
$routes->delete('/datapenduduk/(:num)', 'DataPenduduk::hapus/$1');

// routes iuran masuk
$routes->get('/iuranmasuk/add', 'IuranMasuk::add');
$routes->get('/iuranmasuk/(:num)', 'IuranMasuk::edit/$1');
$routes->post('/iuranmasuk/(:num)', 'IuranMasuk::update/$1');
$routes->delete('/iuranmasuk/(:any)', 'IuranMasuk::hapus/$1');

// routes iuran keluar
$routes->get('/iurankeluar/add', 'IuranKeluar::add');
$routes->get('/iurankeluar/(:num)', 'IuranKeluar::edit/$1');
$routes->post('/iurankeluar/(:num)', 'IuranKeluar::update/$1');
$routes->delete('/iurankeluar/(:any)', 'IuranKeluar::hapus/$1');

// routes iuran tunggakan
$routes->get('/iurantunggakan/add', 'IuranTunggakan::add');
$routes->get('/iurantunggakan/(:num)', 'IuranTunggakan::edit/$1');
$routes->post('/iurantunggakan/(:num)', 'IuranTunggakan::update/$1');
$routes->delete('/iurantunggakan/(:any)', 'IuranTunggakan::hapus/$1');

// routes kelola akun
$routes->get('/kelolaakun/add', 'KelolaAkun::add');
$routes->get('/kelolaakun/(:num)', 'KelolaAkun::edit/$1');
$routes->post('/kelolaakun/(:num)', 'KelolaAkun::update/$1');
$routes->delete('/kelolaakun/(:any)', 'KelolaAkun::hapus/$1');

// routes thread
$routes->get('/thread/add', 'Thread::add');
$routes->get('/thread/view/(:num)', 'Thread::view/$1');
$routes->get('/thread/(:num)', 'Thread::edit/$1');
$routes->get('/thread/download/(:num)', 'Thread::download/$1');
$routes->post('/thread/(:num)', 'Thread::update/$1');
$routes->delete('/thread/(:any)', 'Thread::hapus/$1');

// routes reply
$routes->get('/reply/add/(:num)', 'Reply::add/$1');
$routes->get('/reply/simpan/(:num)', 'Reply::simpan/$1');
$routes->get('/reply/(:num)', 'Reply::edit/$1');
$routes->post('/reply/(:num)', 'Reply::update/$1');
$routes->delete('/reply/(:any)', 'Reply::hapus/$1');

// routes Pengaturan akun
$routes->get('/pengaturanakun/(:num)', 'PengaturanAkun::edit/$1');
$routes->post('/pengaturanakun/(:num)', 'PengaturanAkun::update/$1');



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
