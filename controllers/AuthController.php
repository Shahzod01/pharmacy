<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $user = new User();
        if($request->isPost()){
            $user->loadData($request->getBody());
            if($user->validate() && $user->register()){
                return "Success";
            }
            return $this->render('register', [
                "model" => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            "model" => $user
        ]);
    }
}