<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$reqlogin = ['filter' => 'login'];
$routes->get('/', 'Home::index');

$routes->group('' , $reqlogin , function($routes) {
    $routes->get('dashboard', 'Home::dashboard');
    $routes->get('rewards', 'Home::rewards');
    $routes->get('class', 'Home::kelas');
    $routes->get('scan', 'Home::scan');
    $routes->get('absen' , 'Home::absen');
    $routes->get('profile', 'Home::profile');
        
});

