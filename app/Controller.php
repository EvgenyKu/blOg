<?php

namespace App;

class Controller
{
    protected function render(string $viewName, array $data = [])
    {
        $page = new Page($viewName, $data);
    }
}