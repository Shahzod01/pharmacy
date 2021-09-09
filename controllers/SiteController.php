<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;

/**
 * Class SiteController
 *
 * @author Shahzod Toatov shahzodtoatov@gmail.com
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function home()
    {
        $data = [
            'name' => 'Shahzod'
        ];
        return $this->render('home', $data);
    }
    public function contacts()
    {
        return $this->render('contacts');
    }

    public function handleContact(Request $request)
    {
        $body = Application::$app->request->getBody();

    }
}