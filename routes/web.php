<?php


use Laravel\Lumen\Routing\Router;

$countries = [
    'Russia', 'China', 'Thailand', 'Hong Kong', 'Macau', 'Australia', 'Japan', 'Malaysia',
    'Singapore', 'France', 'South Korea', 'Taiwan', 'United States', 'Vietnam', 'United Arab Emirates', 'Canada',
    'Italy', 'United Kingdom', 'Belgium', 'Cambodia', 'Germany', 'Finland', 'India', 'Nepal', 'Philippines',
    'Spain', 'Sri Lanka', 'Sweden', 'Egypt', 'Cambodia'
];

/** @var Router $router */

$router->get('/', function () use ($router, $countries) {
    $stats = json_decode(file_get_contents(storage_path('app') . DIRECTORY_SEPARATOR . 'data.json'), true);
    $stats['countries'] = $countries;
    return view('layout', $stats);
});


$router->get('/live', function () use ($router, $countries) {
    $stats = json_decode(file_get_contents(storage_path('app') . DIRECTORY_SEPARATOR . 'data.json'), true);
    $stats['countries'] = $countries;

    return response()->json($stats);
});
