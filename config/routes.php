<?php
/**
 * Шаблоны для роутов. Разделённые по методу запроса
 * ключ массива - маска для uri запроса пользователя
 * значение массива - Класс@метод для выполнения
 */
return [
    'GET' => [
        '/' => '\Controller\MainPageController@index',
        '/register' => '\Controller\RegisterController@registerForm',
        '/login' => '\Controller\AuthController@index',
        '/post/{id}' => '\Controller\PostController@viewById',
        '/post/{id}/{name}' => '\Controller\PostController@meth',
    ],
    'POST' => [
        '/register' => '\Controller\RegisterController@register'
    ],
    'PUT' => [

    ]
];