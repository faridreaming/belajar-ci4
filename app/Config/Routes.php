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
    $routes->get('berita/edit/(:num)', 'Berita::showEditForm/$1');
    $routes->put('berita/(:num)', 'Berita::edit/$1');

    $routes->get('prestasi', 'Prestasi::index');
    $routes->get('prestasi/tambah', 'Prestasi::showTambahForm');
    $routes->post('prestasi/tambah', 'Prestasi::tambah');
    $routes->delete('prestasi/(:num)', 'Prestasi::delete/$1');
    $routes->get('prestasi/edit/(:num)', 'Prestasi::showEditForm/$1');
    $routes->put('prestasi/(:num)', 'Prestasi::edit/$1');

    $routes->get('gambar', 'Gambar::index');
    $routes->get('gambar/tambah', 'Gambar::showTambahForm');
    $routes->post('gambar/tambah', 'Gambar::tambah');
    $routes->delete('gambar/(:num)', 'Gambar::delete/$1');
    $routes->get('gambar/edit/(:num)', 'Gambar::showEditForm/$1');
    $routes->put('gambar/(:num)', 'Gambar::edit/$1');
});

// Home routes
$routes->group('', function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('profil', 'Home::profil');
    $routes->get('prestasi', 'Home::prestasi');
    $routes->get('berita', 'Home::berita');
    $routes->get('prestasi/(:segment)', 'Home::prestasiDetail/$1');
});

// Auth routes
$routes->group('auth', function ($routes) {
    $routes->get('login', 'Auth::showLoginForm');
    $routes->post('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
});

// Dashboard redirect
$routes->get('dashboard', function() {
    return redirect()->to(base_url('admin'));
});
