<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Models\UserModel;

class ProfileController extends BaseController
{
    public function __construct() {
        $this->userModel = new UserModel();
    }
    public function UpdateProfile()
    {
        $newusername = $this->request->getPost('username');
        $updated = $this->userModel->update(user()->id , [
            'username' => $newusername
        ]);

        if ($updated){
            return redirect()->to('/profile')->with('success' , 'Update data berhasil');
        }

        return redirect()->to('/profile')->with('error' , 'Nama sudah dipakai');
    }
}
