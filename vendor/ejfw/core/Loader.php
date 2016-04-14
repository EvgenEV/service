<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ejfw\core;

/**
 * Автозагрузка классов
 *
 * @author Epifanov Evgeny
 */
class Loader {
    public function loadClass($className) 
    {
        //Разбиваем строку по обратному слэшу и записываем в массив
        $arr = explode('\\', $className);
        //Получаем первый элемент массива и удаляем его
        $prefix = array_shift($arr);
        
        //Формируем начало пути в зависимости от переменной $prefix
        switch ($prefix)
        {
        case 'app':
            $path = '../app/';
            break;
            
        case 'ejfw':
            $path = '../vendor/ejfw/';
            break;
        }
        
        //Объединяем элементы массива в строку и присоединяем к начальному пути
        $path .= implode('/', $arr) . '.php';
        
        //Если $path это файл, то подключаем его
        if (is_file($path))
        {
            require_once $path;
        }
    }
}