<?php

namespace Controller;

use App\Controller;

class AuthController extends Controller
{
    public function index()
    {
        $this->render('auth/index');
    }
}