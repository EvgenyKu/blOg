<?php

namespace Controller;

use App\Controller;

class RegisterController extends Controller
{
    public function registerForm()
    {
        $this->render('register/index');
    }

    public function register(array $data)
    {

    }
}