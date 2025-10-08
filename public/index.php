<?php
if (file_exists(__DIR__ . '/../maintenance.flag')) {
    $_SERVER['REQUEST_URI'] = '/maintenance';
    //     require __DIR__.'/../src/MaintenanceKernel.php';
    //     exit;
}

use App\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
