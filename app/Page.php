<?php

namespace App;

class Page
{
    private string|bool $layout;
    private $page;
    private string|bool $view;
    private $title = __APP_NAME__;

    public function __construct(string $viewName, array $data = [])
    {
        $viewPath = __ROOT__."/views/{$viewName}.php";
        if (file_exists($viewPath)) {
            $this->view = file_get_contents($viewPath);
            $this->layout = $this->getLayout($this->view);
        }else{
            $this->view = false;
            $this->layout = false;
        }

        //Добавляем view в layout от которого он наследуется
        if ($this->layout){
            $this->page = $this->buildPage($this->layout, $this->view);
        }else {
            $this->page = $this->view;
        }

        //Подключаем "подключаемые части" к сгенерированной странице
        $this->page = $this->includeParts($this->page);

        //Вставляем переданные данные вместо тегов
        $this->page = $this->setVars($this->page, $data);
        echo $this->page;
    }

    /**
     * Поулчает layout от которого наследуется переданный для рендера view
     * @param $view
     * @return string|false
     */
    private function getLayout($view):string|false
    {
        $layout = false;
        if (preg_match("#@\((.+?)\)@#", $view, $matches)){
            $layoutName = $matches[1];
            $layoutPath = __VIEWS_PATHS__."/{$layoutName}.php";
            if (file_exists($layoutPath)){
                $layout = file_get_contents($layoutPath);
            }
        }

        return $layout;
    }

    /**
     * Объединяет view c layout подставляя значения вместо тегов
     * @param $layout
     * @param $view
     * @return void
     */
    public function buildPage($layout, $view)
    {
        preg_match_all('#@{{\s*(.+?)\s*}}#ux', $layout, $matches); //Ищем теги в layout, которые можно заполнить
        $tags = $matches[1]; //получаем имена тегов
        foreach ($tags as $tag) { //Проходим по тегам
            $tagName = trim($tag);//Удаляем лишние пробелы
            if (preg_match("#@$tagName(.*)@end$tagName#s", $view, $matches)){
                //Забираем контент с view между тегами
                $content = $matches[1];
                $layout = preg_replace("#@{{\s$tagName\s}}#", $content, $layout); //Вставляем значения вместо тегов в layout
            }
        }
        return $layout;
    }

    /**
     * Подключает страницы которые определены в шаблоне тегами
     * @param $page
     * @return array|mixed|string|string[]|null
     */
    private function includeParts($page)
    {
        preg_match_all("#&\((.+?)\)&#", $page, $matches);
        $partsNames = $matches[1];
        foreach ($partsNames as $partsName){
            $partPath = __VIEWS_PATHS__."/$partsName.php";
            if (file_exists($partPath)){
                $part = file_get_contents($partPath);
                $page = preg_replace("#&\($partsName\)&#", $part, $page);
            }
        }
        return $page;
    }

    /**
     * Меняет теги на значения переданных переменных
     * @param $page
     * @param $data
     * @return array|mixed|string|string[]|null
     */
    private function setVars($page, $data)
    {
        preg_match_all("#{!(.+?)!}#ux", $page, $matches);
        $vars = $matches[1];
        foreach ($vars as $var){
            $var = trim($var);
            $value = $data[$var]?? '';
            $page = preg_replace("#{!\s*$var\s*!}#ux", $value, $page);
        }
        return $page;
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
    }
}