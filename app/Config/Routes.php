<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Filter untuk admin
$routes->group('', ['filter' => 'isAdmin'], static function ($routes) {
    $routes->get('/pengguna', 'Pengguna::index');
    $routes->post('/pengguna/tambah', 'Pengguna::tambah');
    $routes->post('/pengguna/edit(:any)', 'Pengguna::edit/$1');
    $routes->delete('/pengguna/hapus/(:any)', 'Pengguna::hapus/$1');
});

// Filter untuk petugas
$routes->group('petugas', ['filter' => 'isPetugas'], static function ($routes) {
    //
});

// Rute yang dapat diakses oleh admin dan petugas
$routes->group('', ['filter' => 'isAdminOrPetugas'], static function ($routes) {
    $routes->get('/dashboard', 'Home::index');
    //kelola barang
    $routes->get('/barang', 'Barang::index');
    $routes->post('/barang/tambah', 'Barang::tambah');
    $routes->post('/barang/edit(:any)', 'Barang::edit/$1');
    $routes->delete('/barang/hapus/(:any)', 'Barang::hapus/$1');
    $routes->get('/barang/generatepdf', 'Barang::generatepdf');
    //kelola kategori
    $routes->get('/kategori', 'Kategori::index');
    $routes->post('/kategori/tambah', 'Kategori::tambah');
    $routes->post('/kategori/edit(:num)', 'Kategori::edit/$1');
    $routes->delete('/kategori/hapus/(:num)', 'Kategori::hapus/$1');
    //kelola pelanggan
    $routes->get('/pelanggan', 'Pelanggan::index');
    $routes->post('/pelanggan/tambah', 'Pelanggan::tambah');
    $routes->post('/pelanggan/edit/(:any)', 'Pelanggan::edit/$1');
    $routes->match(['get', 'post'], 'pelanggan/hapus/(:any)', 'Pelanggan::hapus/$1');
    //kelola penitipan


    $routes->get('/peminjaman', 'Home::pinjambarang');
    $routes->get('/penitipan', 'Home::titipbarang');
});

// Rute untuk login dan logout
$routes->get('/', 'Login::index');
$routes->post('/login', 'Login::login');
$routes->get('/logout', 'Login::logout');
