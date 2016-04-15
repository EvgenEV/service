<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ejfw\core;

/**
 * Description of router
 *
 * @author Epifanov Evgeny
 */
class Router {

    private $routes;
    private $prefix;

    public function __construct($routes, $ns) {
        $this->routes = $routes;
        $this->ns = $ns;
    }

    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            //Получаем URI
            $str = $_SERVER['REQUEST_URI'];
            //Избавляемся от параметров и прочего
            $str = parse_url($str, PHP_URL_PATH);
            //Декодируем символы
            $str = urldecode($str);
            //Убираем слэши в начале и конце
            //$str = trim($str, '/');

            return $str;
        }
    }

    public function start() {
        $result = null;
        $str = $this->getURI();
        //Перебираем массив правил маршрутизации
        foreach ($this->routes as $route => $action) {
            //Если в URI найдено совпадение с правилом
            if (preg_match("~$route~", $str, $matches)) {
                //Получаем имя класса-контроллера
                $className = $this->ns . ucfirst($action['controller']) . 'Controller';
                //Получаем имя метода - экшена
                $actionName = 'action' . ucfirst($action['action']);
                
                //ПАРАМЕТРЫ
                //Если в массиве $matches больше одного элемента
                //(Т.е. в строке URI присутствуют параметры)
                if (isset($matches[1]))
                {
                    //Удаляем первый элемент массива, которы содержит полную 
                    //строку совпалдения с правилом маршрутизации
                    unset($matches[0]);
                    //Присваиваем новые ключи
                    sort($matches);
                }
                //Создаем объект-контроллер
                $controllerObject = new $className;
                //Вызываем нужный медод - экшн
                call_user_func_array([$controllerObject, $actionName], $matches);
                $result = true;
                //Прерываем перебор массива правил маршрутизации
                break;
            }
        }
        
        //Если совпадения не найдены
        if ($result == null) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
            header('Content-type: text/html; charset=UTF-8');
            echo 'Ошибка: Страница не найдена!';
            exit;

        }
    }

}
