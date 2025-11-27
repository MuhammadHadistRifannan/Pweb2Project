<?php

use App\Controllers\QrController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$reqloginMahasiswa = ['filter' => 'login'];
$reqloginMentor = ['filter' => 'login','role_mentor:mentor'];


$routes->get('/', 'Home::index');
$routes->get('home' , 'Home:index');

$routes->get('loginmentor' , 'MentorAuthController::login');
$routes->post('loginmentor' , 'MentorAuthController::attemptLogin');

//peserta
$routes->group('' , $reqloginMahasiswa , function($routes) {
    $routes->get('dashboard', 'Home::dashboard');
    $routes->get('rewards', 'Home::rewards');
    $routes->get('kelas', 'Home::kelas');
    $routes->get('absen' , 'Home::absen');
    $routes->get('profile', 'Home::profile');
    $routes->get('analitik', 'Home::analitik');


    // ========== REWARDS 
    $routes->post('rewards/reedem/(:any)' , 'RewardsController::ExchangeRewards');
    // ========== Absen 
    $routes->post('absen/check' , 'AbsenController::CheckAbsen');
    // ========= daftar kelas 
    $routes->get('daftarkelas' , 'KelasController::EnrollKelas');

    $routes->post('profile' , 'ProfileController::UpdateProfile');

});


//mentor 
$routes->group('mentor' , $reqloginMentor , function($routes) { 
    $routes->get('dashboard' , function() {return view('auth/dashboard');});
    $routes->get('qr-form' , 'QrController::showForm');
    $routes->post('generate-qr' , 'QrController::generate');


    $routes->get('data-kelas/(:any)' , 'QrController::getDataKelas/$1');
});



$routes->get('auth/google', 'GoogleAuthController::SignInWithGoogle');
$routes->get('auth/google-callback', 'GoogleAuthController::googlecallback');
