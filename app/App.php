<?php

namespace App;


class App
{
    /**
     * Создаём экземпляр нужного контроллера
     * и вызываем нужный метод
     * с параметрами
     * @param $uri
     * @return void
     */
    public function run($requestMethod, $uri)
    {
        $entity = (new Router())->getClassAndMethod($requestMethod, $uri);
        $className = $entity['class'];
        $method = $entity['method'];
        $params = $entity['params'];

        $object = new $className();
        if (method_exists($object, $method)) {
            $object->{$method}(...$params);
        }else {
            echo "Нет нужного метода $method у класса $className";
        }

    }
}