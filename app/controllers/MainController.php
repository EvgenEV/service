<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Главный контроллер
 *
 * @author Epifanov Evgeny
 */

class MainController extends \ejfw\core\Controller
{
    public function actionIndex() 
    {
        echo 'Главная страница';
    }
}
