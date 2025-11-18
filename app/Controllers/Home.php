<?php

namespace App\Controllers;

use App\Models\Absen;
use App\Models\Kelas;
use App\Models\Progress;
use App\Models\Rewards;
use App\Models\RewardsDetail;

class Home extends BaseController
{

    public function __construct() {
        $this->Rewards = new Rewards();
        $this->Kelas = new Kelas();
        $this->Absen = new Absen();
        $this->Progress = new Progress();
        $this->DetailRewards = new RewardsDetail();
    }
    public function index(): string
    {
        return view('home');
    }

    public function dashboard(){
        $data['user'] = user();
        return view('dashboard' , $data);
    }

    public function rewards()
    {
        $data = [
            'user' => user(),
            'rewards' => $this->Rewards->findAll()
        ];
        return view('rewards' , $data);
    }

    public function profile(){
        return view('profile');
    }

    public function absen(){
        $data = [
            'user' => user(),
            'absen' => $this->Absen->findAll()
        ];
        return view('absensi' , $data);
    }

    public function scan(){
        $data = [
            'user' => user(),
            'rewards' => $this->Rewards->findAll()
        ];
        return view('scan');
    }

    public function kelas(){
        $data['kelas'] = $this->Kelas->findAll();
        return view('kelas' , $data);
    }
}
