<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Login page (home)
$routes->get('/', 'UserController::index');
$routes->post('/', 'UserController::index');

// Registration page
$routes->get('/register', 'UserController::register');
$routes->post('/register', 'UserController::register');

// Profile page
$routes->get('/profile', 'UserController::profile');
$routes->post('/profile', 'UserController::profile');

// Logout
$routes->get('/logout', 'UserController::logout');