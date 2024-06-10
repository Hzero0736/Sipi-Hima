<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Routes for Admin(barang)
$routes->get('/barang', 'Barang::index');
$routes->post('/barang/tambah', 'Barang::tambah');
$routes->post('/barang/edit(:any)', 'Barang::edit/$1');
$routes->delete('/barang/hapus/(:any)', 'Barang::hapus/$1');
$routes->get('/barang/generatepdf', 'Barang::generatepdf');

// Routes for Admin(kategori)
$routes->get('/kategori', 'Kategori::index');
$routes->post('/kategori/tambah', 'Kategori::tambah');
$routes->post('/kategori/edit(:num)', 'Kategori::edit/$1');
$routes->delete('/kategori/hapus/(:num)', 'Kategori::hapus/$1');

// Routes for Admin(pelanggan)
$routes->get('/pelanggan', 'Home::pelanggan');

// Routes for Admin(user)
$routes->get('/user', 'Home::user');

// Routes for Admin(peminjaman)
$routes->get('/peminjaman', 'Home::pinjambarang');

// routes for Admin(penitipan)
$routes->get('/penitipan', 'Home::titipbarang');

$routes->get('/login', 'Home::login');
