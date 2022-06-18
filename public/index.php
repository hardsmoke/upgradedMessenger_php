<?php

use Messenger\Application;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$requestedPath = explode('?', $_SERVER['REQUEST_URI'])[0];

$application = new Application();
echo $application->run();