<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('auth', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
<<<<<<< HEAD
$routes->get('authlogout', 'Auth::logout');
$routes->get('dashboard', 'Dashboard::index');
=======
$routes->get('auth/logout', 'Auth::logout');

>>>>>>> 6bbfd59b7aec29399aa6284b44b0495dcceb93a0

