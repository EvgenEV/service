<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

//Устанавливаем автозагрузчик
require_once '../vendor/ejfw/core/Loader.php';
$loader = new ejfw\core\Loader();
spl_autoload_register([$loader, 'loadClass']);

//Подгружаем правила маршрутизации
require_once '../app/config/routes.php';

//Запускаем роутер
$ns = '\\app\\controllers\\'; //пространство имен классов-контроллеров
$router = new ejfw\core\Router($routes, $ns);
$router->start();



