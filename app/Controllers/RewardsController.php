<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Rewards;
use CodeIgniter\HTTP\ResponseInterface;

class RewardsController extends BaseController
{
    public function __construct() {
        $this->Rewards = new Rewards();
    }

    public function ExchangeRewards(){
        $data = $this->request->getPost();
        $rewardpoint = (int)$data['point-reward'];
        $userpoint = (int)$data['point-user'];
        
        if ($userpoint < $rewardpoint){
            return redirect()->to('/rewards')->with('error' , "Point tidak cukup, kumpulkan lebih banyak poin");
        }

         
    }
}
