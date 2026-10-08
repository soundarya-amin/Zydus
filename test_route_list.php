<?php
$output = shell_exec('php artisan route:list 2>&1');
file_put_contents('route_list_output.txt', $output);
