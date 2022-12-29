<?php

declare(strict_types=1);

namespace App\Controller;

use App\CustomResponse as Response;
use Pimple\Psr11\Container;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

final class Home
{
  private const API_NAME = 'slim4-api-skeleton';

  private const API_VERSION = '0.39.0';

  private Container $container;

  public function __construct(Container $container)
  {
    $this->container = $container;
  }

  public function getHelp(Request $request, Response $response): Response
  {
    $message = [
      'api' => self::API_NAME,
      'version' => self::API_VERSION,
      'timestamp' => time(),
    ];

    return $response->withJson($message);
  }

  public function getStatus(Request $request, Response $response): Response
  {
    $this->container->get('db');
    $status = [
      'status' => [
        'database' => 'OK',
      ],
      'api' => self::API_NAME,
      'version' => self::API_VERSION,
      'timestamp' => time(),
    ];

    return $response->withJson($status);
  }

  public function esCV(Request $request, Response $response): Response
  {
    $view = Twig::fromRequest($request);

    return $view->render($response, 'cv.html', [
      'name' => 'Edgar Rubi Urbina',
      'ocp' => 'Desarrollador Web',
      'web' => 'https://erufenix.dev',
      'mail' => 'erufenix@gmail.com',
    ]);
  }

  public function enCV(Request $request, Response $response): Response
  {
    $view = Twig::fromRequest($request);

    return $view->render($response, 'cv_en.html', [
      'name' => 'Edgar Rubi Urbina',
      'ocp' => 'Web Developer',
      'web' => 'https://erufenix.dev',
      'mail' => 'erufenix@gmail.com',
    ]);
  }
}
