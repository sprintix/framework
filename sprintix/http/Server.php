<?php

namespace Raptor\Http;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Server {

    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, ResponseInterface $response)
    {
        $data = $request->getParsedBody();
        $processedData = $this->container->make(Http\Handlers\HomeRequestHandler::class)->handle($request);
        $response->getBody()->write($processedData);
    }

}