<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\RegisterModel;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if($request->isPost()){
            $registerModel->loadData($request->getBody());
            // dd($registerModel);
            if($registerModel->validate() && $registerModel->register()){
                return "Success";
            }
//            dd($registerModel->errors);
            return $this->render('register', [
                "model" => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            "model" => $registerModel
        ]);
    }
}