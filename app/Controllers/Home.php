<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function rewards()
    {
        return view('rewards');
    }

    public function profile(){
        return view('profile');
    }

    public function absen(){
        return view('absensi');
    }

    public function scan(){
        return view('scan');
    }

    public function kelas(){
        return view('kelas');
    }
}
