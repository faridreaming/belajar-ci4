<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Admin routes
$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin::index');

    $routes->get('berita', 'Berita::index');
    $routes->get('berita/tambah', 'Berita::showTambahForm');
    $routes->post('berita/tambah', 'Berita::tambah');
    $routes->delete('berita/(:num)', 'Berita::delete/$1');

    $routes->get('gambar', 'Admin::index');
});

// Home routes
$routes->group('', function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('berita', 'Home::berita');
});
