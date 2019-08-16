<?php

use Pimcore\Bootstrap;
use Pimcore\Tool;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Kernel;

require_once __DIR__ . '/../vendor/autoload.php';

(function () {
    Bootstrap::setProjectRoot();
    Bootstrap::bootstrap();
    $request = Request::createFromGlobals();
    Tool::setCurrentRequest($request);
    /** @var Kernel $kernel */
    $kernel = Bootstrap::kernel();
    Tool::setCurrentRequest(null);
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);
})();
