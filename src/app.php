<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('hello', new Routing\Route('/hello/{name}', array(
    'name' => 'World',
    '_controller' => 'Greetings\\Controller\\GreetingsController::helloAction'
)));

$routes->add('bye', new Routing\Route('/bye', array(
        '_controller' => 'Greetings\\Controller\\GreetingsController::byeAction'
)));

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
        'year' => null,
        '_controller' => 'Calendar\\Controller\\LeapYearController::indexAction',
)));

return $routes;