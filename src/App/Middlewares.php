<?php

declare(strict_types=1);

use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

return static function (App $app, Closure $customErrorHandler): void {
  $path = $_SERVER['SLIM_BASE_PATH'] ?? '';
  $app->setBasePath($path);
  $app->addRoutingMiddleware();
  $app->addBodyParsingMiddleware();
  $twig = Twig::create('../src/Templates', ['cache' => false, 'debug' => true]);
  $twig->addExtension(new \Twig\Extension\DebugExtension());
  $app->add(TwigMiddleware::create($app, $twig));
  $displayError = filter_var(
    $_SERVER['DISPLAY_ERROR_DETAILS'] ?? false,
    FILTER_VALIDATE_BOOLEAN
  );
  $errorMiddleware = $app->addErrorMiddleware($displayError, true, true);
  $errorMiddleware->setDefaultErrorHandler($customErrorHandler);
};
