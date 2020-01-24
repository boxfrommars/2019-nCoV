<?php


use Laravel\Lumen\Routing\Router;


/** @var Router $router */

$router->get('/', function () use ($router) {
    $stats = json_decode(file_get_contents(storage_path('app') . DIRECTORY_SEPARATOR . 'data.json'), true);
    return view('layout', $stats);
});
