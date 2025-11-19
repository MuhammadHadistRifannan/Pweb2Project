<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RewardsDetail;
use App\Models\Rewards;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Models\UserModel;

class RewardsController extends BaseController
{
    public function __construct()
    {
        $this->Rewards = new Rewards();
        $this->RewardsDetail = new RewardsDetail();
        $this->User = new UserModel();
    }
    public function ExchangeRewards()
    {
        $data = $this->request->getPost();
        $rewardpoint = (int) $data['point-reward'];
        $userpoint = (int) $data['point-user'];

        if ($userpoint < $rewardpoint) {
            return redirect()->to('/rewards')->with('error', "Point tidak cukup, kumpulkan lebih banyak poin");
        }

        //add data in detail rewards
        $saveData = [
            'id_reward' => $data['id_reward'],
            'id_user' => $data['id_user'],
            'waktu_klaim' => date('Y-m-d')
        ];

        //Add records to detail rewards
        $this->RewardsDetail->save($saveData);

        //Update the rewards stock if the title rewards exchange
        if ($data['category'] == 'privilege') {
            $this->Rewards->update($data['id_reward'], [
                'stok' => $data['stok'] - 1
            ]);
            $this->User->update(
                $data['id_user'],
                [
                    'point' => $userpoint - $rewardpoint,
                    'title' => 'sepuh'
                ]
            );
            return redirect()->to('/rewards')->with('success', 'Rewards ditukar , selamat title anda berubah !! menjadi ' . $data['category']);
        }
        
        
        //Otherwise
        $this->Rewards->update($data['id_reward'], [
            'stok' => $data['stok'] - 1
        ]);
        $this->User->update(
            $data['id_user'],
            [
                'point' => $userpoint - $rewardpoint
            ]
        );

        return redirect()->to('/rewards')->with('success', 'Rewards ditukar , anda mendapatkan hadiah');

    }
}
