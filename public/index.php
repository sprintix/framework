<?php

require_once __DIR__.'/../vendor/autoload.php';

$container = new Illuminate\Container\Container();
// $container->bind(Processor::class, function () {
//     return new Processor();
// });

$server = new \Raptor\Http\Server($container);

$server->process(
    \HttpSoft\ServerRequest\ServerRequestCreator::create(),
    new \HttpSoft\Message\Response()
);
