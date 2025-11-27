<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Google\Service\Oauth2;
use Google\Client;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class GoogleAuthController extends BaseController
{
    public function SignInWithGoogle()
    {
        //
        $client = new Client();
        $client->setClientId(env("GOOGLE_CLIENT_ID"));
        $client->setClientSecret(env("GOOGLE_CLIENT_SECRET"));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope('email');
        $client->addScope('profile');
        return redirect()->to($client->createAuthUrl());
    }

    public function googlecallback()
    {
        $code = $this->request->getGet('code');

        if (!$code) {
            return redirect()->to('/login')->with('error', 'Kode Google tidak ditemukan!');
        }

        // 1. Tukar CODE → ACCESS TOKEN
        $client = new Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));

        $token = $client->fetchAccessTokenWithAuthCode($code);

        if (!isset($token['access_token'])) {
            return redirect()->to('/login')->with('error', 'Token Google gagal diambil!');
        }

        // 2. Ambil USER INFO dari Google
        $oauth = new Oauth2($client);
        $googleUser = $oauth->userinfo->get();

        /*
          googleUser sekarang berisi:

          $googleUser->email
          $googleUser->name
          $googleUser->id
          $googleUser->picture
        */

        $userModel = new UserModel();

        // 3. Cek ada user atau belum berdasarkan email
        $existing = $userModel->where('email', $googleUser->email)->first();

        if (!$existing) {
            helper('text');
            $entity = new User();
            $entity->email = $googleUser->email;
            $entity->username = $googleUser->name;
            $entity->password = Password::hash(random_string('alnum', 16));
            $entity->active = 1;

            $id = $userModel->withGroup('mahasiswa')->insert($entity);
            $existing = $userModel->find($id);
        }

        // 4. LOGIN
        $auth = service('authentication');
        $auth->login($existing);

        return redirect()->to('/dashboard');
    }
}
