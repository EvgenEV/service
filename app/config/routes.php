<?php

/**
 * Массив правил маршрутизации
 */

$routes = [
    '^products/(\w+)/(\d+)$' => ['controller' => 'products', 'action' => 'view'],
    '^products/(\w+)$' => ['controller' => 'products', 'action' => 'category'],
    '^products$' => ['controller' => 'products', 'action' => 'index'],
];
