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
        
    }
}
