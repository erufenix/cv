<?php

declare(strict_types=1);

//$app->get('/', 'App\Controller\Home:getHelp');
//$app->get('/status', 'App\Controller\Home:getStatus');

$app->get('/', 'App\Controller\Home:esCV');
$app->get('/en', 'App\Controller\Home:enCV');
