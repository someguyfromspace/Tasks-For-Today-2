<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::welcome');


$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Pages::profile');
$routes->get('about', 'Pages::about');

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attempt');

$routes->get('logout', 'Auth::logout', ['filter' => 'auth']);

$routes->group('tasks', ['filter' => 'auth'], static function ($routes) {
    $routes->get('new', 'Tasks::new');
    $routes->post('create', 'Tasks::create');
    $routes->get('edit/(:num)', 'Tasks::edit/$1');
    $routes->post('update/(:num)', 'Tasks::update/$1');
    $routes->post('archive/(:num)', 'Tasks::archive/$1');
});

