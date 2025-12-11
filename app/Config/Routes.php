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
// localhost:8080/dashboard 
$routes->group('' , $reqloginMahasiswa , function($routes) {
    $routes->get('dashboard', 'Home::dashboard');
    $routes->get('rewards', 'Home::rewards');
    $routes->get('kelas', 'Home::kelas');
    $routes->get('absen' , 'Home::absen');
    $routes->get('profile', 'Home::profile');
<<<<<<< HEAD
    $routes->post('/absen/check', 'AbsenController::CheckAbsen');

=======
    $routes->get('analitik', 'Home::analitik');
>>>>>>> 1c55a81aa0d3c26d0049463da65f67a2ef21703d


    // ========== REWARDS 
    $routes->post('rewards/reedem/(:any)' , 'RewardsController::ExchangeRewards');
    // ========== Absen 
    $routes->post('absen/check' , 'AbsenController::CheckAbsen');
    // ========= daftar kelas 
    $routes->post('daftarkelas/(:any)' , 'KelasController::EnrollKelas/$1');

    $routes->post('profile' , 'ProfileController::UpdateProfile');

});


//mentor 
$routes->group('mentor' , $reqloginMentor , function($routes) { 
    $routes->get('dashboard' , function() {return view('auth/dashboard');});
    $routes->get('qr-form' , 'QrController::showForm');
    $routes->post('generate-qr' , 'QrController::generate');


    $routes->get('data-kelas/(:any)' , 'QrController::getDataKelas/$1');
});
