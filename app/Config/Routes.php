<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/barang', 'Barang::index');
$routes->post('/barang/tambah', 'Barang::tambah');
$routes->post('/barang/edit(:any)', 'Barang::edit/$1');
$routes->delete('/barang/hapus/(:any)', 'Barang::hapus/$1');
$routes->get('/Barang/generatePdf', 'Barang::generatePdf');

$routes->get('/kategori', 'Kategori::index');
$routes->post('/kategori/tambah', 'Kategori::tambah');
$routes->post('/kategori/edit(:num)', 'Kategori::edit/$1');
$routes->delete('/kategori/hapus/(:num)', 'Kategori::hapus/$1');

$routes->get('/login', 'Home::login');
