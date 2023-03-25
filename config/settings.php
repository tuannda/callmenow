<?php
// Should be set to 0 in production
use Monolog\Logger;

error_reporting(E_ALL);
// Should be set to '0' in production
ini_set('display_errors', '1');
// Settings
$settings = [];

// Path settings
$settings['root'] = dirname(__DIR__);
$settings['temp'] = $settings['root'] . '/storage/tmp';
$settings['cache'] = $settings['temp'] . '/cache';

// Logger settings
$settings['logger'] = [
    'name' => 'app',
    'path' => $settings['temp'] . '/log',
    'filename' => 'app.log',
    'level' => Logger::ERROR,
    'file_permission' => 0775,
];

// Php renderer views
$settings['view'] = [
    'path' => $settings['root'] . '/views',
    'layout' => 'layout/main.php'
];

return $settings;
