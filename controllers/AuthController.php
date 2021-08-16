<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\LoginForm;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()){
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        if($request->isPost()){
            $user->loadData($request->getBody());
            if($user->save()){
                Application::$app->session->setFlash('success', 'Thank you for registration');
                Application::$app->response->redirect('/');
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