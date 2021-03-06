<?php


use Laravel\Lumen\Routing\Router;

$countries = [
    "China",
    "Italy",
    "Iran",
    "South Korea",
    "Spain",
    "Germany",
    "France",
    "United States",
    "Switzerland",
    "Norway",
    "Denmark",
    "Sweden",
    "Japan",
    "Netherlands",
    "United Kingdom",
    "Belgium",
    "Austria",
    "Qatar",
    "Bahrain",
    "Australia",
    "Singapore",
    "Canada",
    "Malaysia",
    "Finland",
    "Hong Kong",
    "Israel",
    "Greece",
    "Czech Republic",
    "Iceland",
    "Slovenia",
    "United Arab Emirates",
    "Iraq",
    "Egypt",
    "Kuwait",
    "Portugal",
    "Brazil",
    "Lebanon",
    "India",
    "Thailand",
    "San Marino",
    "Ireland",
    "Indonesia",
    "Romania",
    "Saudi Arabia",
    "Poland",
    "Philippines",
    "Taiwan",
    "Vietnam",
    "Estonia",
    "Russia",
    "Albania",
    "Chile",
    "Argentina",
    "Palestine",
    "Serbia",
    "Croatia",
    "Panama",
    "Algeria",
    "Luxembourg",
    "Brunei",
    "Georgia",
    "Bulgaria",
    "Costa Rica",
    "Peru",
    "Belarus",
    "Pakistan",
    "Slovakia",
    "Azerbaijan",
    "Ecuador",
    "Oman",
    "Hungary",
    "Latvia",
    "South Africa",
    "Cyprus",
    "Tunisia",
    "Malta",
    "Mexico",
    "Bosnia and Herzegovina",
    "Macau",
    "Senegal",
    "Colombia",
    "North Macedonia",
    "Jamaica",
    "Maldives",
    "Afghanistan",
    "Armenia",
    "Moldova",
    "Morocco",
    "Paraguay",
    "Dominican Republic",
    "New Zealand",
    "Cambodia",
    "Cuba",
    "Liechtenstein",
    "Bangladesh",
    "Bolivia",
    "Lithuania",
    "Sri Lanka",
    "Ukraine",
    "Burkina Faso",
    "Cameroon",
    "Ghana",
    "Honduras",
    "Ivory Coast",
    "Jersey",
    "Kazakhstan",
    "Nigeria",
    "Turkey",
    "Andorra",
    "Bhutan",
    "Cayman Islands",
    "DR Congo",
    "Gabon",
    "Guernsey",
    "Guyana",
    "Jordan",
    "Kenya",
    "Monaco",
    "Mongolia",
    "Nepal",
    "St. Vincent and the Grenadines",
    "Togo",
    "Trinidad and Tobago",
    "Vatican City",
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
