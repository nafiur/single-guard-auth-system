<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$admin = App\Models\Admin::find(1);

if ($admin) {
    echo str_pad('Column', 25) . ' | Value' . PHP_EOL;
    echo str_repeat('-', 50) . PHP_EOL;
    foreach ($admin->toArray() as $key => $value) {
        $valStr = is_array($value) ? json_encode($value) : (string)$value;
        echo str_pad($key, 25) . ' | ' . $valStr . PHP_EOL;
    }
} else {
    echo 'Admin not found';
}
