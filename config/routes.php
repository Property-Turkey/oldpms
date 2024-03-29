<?php

use Cake\Core\Plugin;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::extensions('xml');

Router::defaultRouteClass('DashedRoute');

Router::addUrlFilter(function ($params, $request) {
    if ($request->getParam('lang') && !isset($params['lang'])) {
        $params['lang'] = $request->getParam('lang');
    }
    return $params;
});

$basicRoutes = function (RouteBuilder $routes) {

    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/register', ['controller' => 'Users', 'action' => 'register']);
    $routes->connect('/getpassword', ['controller' => 'Users', 'action' => 'getpassword']);
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/offer/{id}/{tbl}/{floorplan_id}', ['controller'=>'Proposals', 'action'=>'proposal'])->setPass(['id', 'tbl', 'floorplan_id']);

    $routes->connect('/pages/*', 'Pages::display');
    
    $routes->prefix('admin', function ($routes) {
        $routes->connect('/', ['controller' => 'Users', 'action'=>'dashboard']);
        $routes->connect('/stats', ['controller' => 'Users', 'action'=>'dashboard']);
        $routes->connect('/stats/props', ['controller' => 'Users', 'action'=>'dashboard', 'props' ]);
        $routes->connect('/stats/users', ['controller' => 'Users', 'action'=>'dashboard', 'users' ]);
        $routes->connect('/myaccount', ['controller' => 'Users', 'action'=>'myaccount']);
        $routes->fallbacks('DashedRoute');
    });

    $routes->fallbacks('DashedRoute');
};

$realRoutes = function ($routes) use ($basicRoutes) {
    $routes->scope('/', $basicRoutes);

    return $routes;
};

$routes->scope('/tr', ['lang' => 'tr'], $realRoutes);
$routes->scope('/en', ['lang' => 'en'], $realRoutes);
$routes->scope('/', $realRoutes);
