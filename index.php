<?php
//Подключаем автозагрузку классов
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
//Подключаем начальную конфигурацию
require_once $_SERVER['DOCUMENT_ROOT'].'/config/init.php';

$uri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

(new \App\App())->run($requestMethod, $uri);
