<?php

namespace App;

class Router
{
    private array $routes;

    public function __construct()
    {
        $this->routes = require __ROOT__."/config/routes.php";
    }

    public function getClassAndMethod(string $requestMethod, string $uri ): array
    {
        $routes = $this->routes[$requestMethod]?? [];//Получаем шаблоны роутов по типу запроса на сервер
        //Итерируем полученные шаблоны роутов
        foreach ($routes as $routePattern => $classAndMethod){
            $regEx = $this->getRegEx($routePattern);//составляем регулярное выражение
            //Ищем совпадения текущего uri на получившемся регулярном выражении
            //При совпадении в $params попадут именованные параметры из именованных карманов регулярного выражения
            if (preg_match($regEx, $uri, $params)) {
                $params = $this->clearIntKeysInArray($params); //Удаляем числовые ключи из массива параметров
                $arrayClassAndMethod = explode('@', $classAndMethod);
                //Возврат совпадения
                return [
                    'class' => $arrayClassAndMethod[0],
                    'method' => $arrayClassAndMethod[1],
                    'params' => $params
                ];
            }
        }
        return [
            'class' => '\Controller\ErrorController',
            'method' => 'notFound',
            'params' => []
        ]; //Если не будут найдены совпадения, то отобразится страница notFound
    }

    /**
     * Из шаблона роута someone/{name}/{id} составляет регулярку вида someone/(?<name>[^/]+)/(?<id>[^/])
     * @param string $routePattern
     * @return string
     */
    private function getRegEx(string $routePattern): string
    {
        return '#^' . preg_replace('/{(.+?)}/mu', "(?<$1>[^/]+)", $routePattern) . '(?:/*?)?$#';
    }

    /**
     * Удаляет лишние ключи(числовые) из массива параметров
     * @param array $params
     * @return array
     */
    private function clearIntKeysInArray(array $params): array
    {
        foreach ($params as $key => $param) {
            if (is_int($key)){
                unset($params[$key]);
            }
        }
        return $params;
    }

}