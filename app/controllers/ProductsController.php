<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Контроллер модуля номенклатуры
 *
 * @author Epifanov Evgeny
 */
class ProductsController extends \ejfw\core\Controller
{
    public function actionIndex() {
        echo 'Все товары';
    }
    
    public function actionView() {
        echo 'Страница товара <br />';
        var_dump($arr =  func_get_args());
    }
    
    public function actionCategory() {
        echo 'Категория товаров';
    }
}
