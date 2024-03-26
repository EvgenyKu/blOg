<?php

namespace Controller;

use App\Controller;

class ErrorController extends Controller
{
    public function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        $content = file_get_contents(__VIEWS_PATHS__."/404.php");
        echo $content;
        exit(404);
    }
}