<?php

use App\Controllers\QrController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$reqlogin = ['filter' => 'login'];
$role = ['filter' => 'role:mentor'];

$routes->get('/', 'Home::index');

$routes->get('loginmentor' , 'MentorAuthController::login');
$routes->post('loginmentor' , 'MentorAuthController::attemptLogin');


$routes->group('' , $reqlogin , function($routes) {
    $routes->get('dashboard', 'Home::dashboard');
    $routes->get('rewards', 'Home::rewards');
    $routes->get('kelas', 'Home::kelas');
    $routes->get('absen' , 'Home::absen');
    $routes->get('profile', 'Home::profile');
    $routes->post('/absen/check', 'AbsenController::CheckAbsen');



    // ========== REWARDS 
    $routes->post('rewards/reedem/(:any)' , 'RewardsController::ExchangeRewards');
    // ========== Absen 
    $routes->post('absen/check' , 'AbsenController::CheckAbsen');
    
});


//mentor 
$routes->group('mentor' , $role , function($routes) { 
    $routes->get('dashboard' , function() {return view('auth/dashboard');});
    $routes->get('qr-form' , 'QrController::showForm');
    $routes->post('generate-qr' , 'QrController::generate');


    $routes->get('data-kelas/(:any)' , 'QrController::getDataKelas/$1');
});
