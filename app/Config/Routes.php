<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- Rute Halaman Utama & Autentikasi ---
$routes->get('/', 'Home::index'); // Halaman landing/home
$routes->get('auth', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('/users', 'TabelUsers::index');



// --- Rute Dashboard ---
// HANYA SATU definisi untuk dashboard, yang diarahkan ke controller Pekerjaan
$routes->get('dashboard', 'Pekerjaan::index');


// --- Rute untuk Fitur Pekerjaan (CRUD) ---
$routes->get('pekerjaan/tambah', 'Pekerjaan::tambah');
$routes->post('pekerjaan/simpan', 'Pekerjaan::simpan');
$routes->get('pekerjaan/detail/(:num)', 'Pekerjaan::detail/$1');
$routes->get('pekerjaan/edit/(:num)', 'Pekerjaan::edit/$1');
$routes->post('pekerjaan/update/(:num)', 'Pekerjaan::update/$1');
$routes->get('pekerjaan/hapus/(:num)', 'Pekerjaan::hapus/$1');
