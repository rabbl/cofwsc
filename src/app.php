<?php

use Symfony\Component\Routing;

function is_leap_year($year = null) {
    if (null === $year) {
        $year = date('Y');
    }

    return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
}

$routes = new Routing\RouteCollection();
$routes->add('hello', new Routing\Route('/hello/{name}', array(
    'name' => 'World',
    '_controller' => function ($request) {
        // $foo will be available in the template
        $request->attributes->set('foo', 'bar');
        $response = render_template($request);
        // change some header
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
)));

$routes->add('bye', new Routing\Route('/bye', array(
        '_controller' => function ($request) {
            $response = render_template($request);
            return $response;
        }
)));

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
        'year' => null,
        '_controller' => 'LeapYearController::indexAction',
)));

return $routes;