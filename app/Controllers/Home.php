<?php

namespace App\Controllers;

use App\Models\Absen;
use App\Models\Kelas;
use App\Models\Progress;
use App\Models\Rewards;
use App\Models\RewardsDetail;

class Home extends BaseController
{

    public function __construct()
    {
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

    public function dashboard()
    {
        $data['user'] = user();
        return view('dashboard', $data);
    }

    public function rewards()
    {
        $data = [
            'user' => user(),
            'rewards' => $this->Rewards->findAll()
        ];
        return view('rewards', $data);
    }

    public function profile()
    {
        return view('profile');
    }

    public function absen()
    {
        $data = [
            'user' => user(),
            'absen' => $this->Absen->findAll()
        ];
        return view('absensi', $data);
    }

    public function scan()
    {
        $data = [
            'user' => user()
        ];
        return view('scan', $data);
    }

    public function kelas()
    {
        $data = [
            'user' => user(),
            'kelas' => $this->Kelas->findAll()
        ];
        return view('kelas', $data);
    }
    public function analitik()
    {
        $userId = user()->id;
        $progressModel = new Progress();

        // AMBIL DATA HARI INI
        $today = date('Y-m-d');

        $todayProgress = $progressModel
            ->where('id_user', $userId)
            ->where('DATE(tanggal_gabung)', $today)
            ->first();

        $hadirHariIni = $todayProgress ? $todayProgress['hadir'] : 0;

        // AMBIL SEMUA DATA PROGRESS
        $analitik = $progressModel
            ->select('progress.*, kelas.nama_kelas')
            ->join('kelas', 'kelas.id = progress.id_kelas')
            ->where('progress.id_user', $userId)
            ->orderBy('progress.id', 'ASC')
            ->findAll();

        $latest = end($analitik);

        $totalAbsen = $latest['total_kehadiran'] ?? 0;
        $totalPoint = $latest['total_point'] ?? 0;

        $kelasList = [];
        $progressList = [];

        foreach ($analitik as $row) {
            $kelas = $row['nama_kelas'];

            // jika kelas belum ada → tambahkan
            $kelasList[$kelas] = $kelas;

            // simpan total_kehadiran TERAKHIR per kelas
            $progressList[$kelas] = $row['total_kehadiran'];
        }

        // ubah ke array numerik agar Chart.js bisa baca
        $kelasLabels = array_values($kelasList);
        $kelasData = array_values($progressList);

        // ================================

        $data = [
            'user' => user(),
            'analitik' => $analitik,

            // Statistik
            'total_absen' => $totalAbsen,
            'hadir_hari_ini' => $hadirHariIni,
            'total_point' => $totalPoint,

            // Chart 1 → Absensi Mingguan
            'chart_absen' => [
                'label' => $kelasLabels,
                'data' => $kelasData
            ],

            // Chart 2 → Progress kelas DISTINCT
            'chart_kelas' => [
                'label' => $kelasLabels,
                'data' => $kelasData
            ],

            // logs
            'logs' => $analitik
        ];

        return view('analitik', $data);
    }


}
