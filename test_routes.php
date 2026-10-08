<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$routes = app('router')->getRoutes();

foreach ($routes as $route) {
    if (strpos($route->getActionName(), 'PatientEnrollmentController') !== false) {
        echo "Route: " . $route->uri() . "\n";
        echo "Action: " . $route->getActionName() . "\n";
        echo "Controller: " . ($route->getControllerClass() ?? 'null') . "\n";
    }
}
