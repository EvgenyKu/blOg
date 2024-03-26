<?php

namespace Controller;

use App\Controller;

class MainPageController extends Controller
{
    public function index()
    {
        $this->render('index', [
            'title' => 'Главная страница',
            'some' => 'Text'
        ]);
    }
}