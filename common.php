<?php

use OpenStack\ObjectStore\v1\Service;
use OpenStack\OpenStack;
use Symfony\Component\Dotenv\Dotenv;

require_once './vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__.'/.env');

$startTime = microtime(true);

function uptime()
{
    global $startTime;
    return microtime(true) - $startTime;
}

function createOpenStack(bool $streamed = false)
{
    $options = [
        'authUrl'  => $_ENV['AUTH_URL'],
        'region'   => $_ENV['REGION'],
        'username' => $_ENV['USERNAME'],
        'password' => $_ENV['PASSWORD'],
        'tenantId' => $_ENV['TENANT_ID'],
    ];

    if ($streamed) {
        $options['requestOptions'] = ['stream' => true];
    }

    return new OpenStack($options);
}

function testDownload(Service $objectStore)
{
    $container = $objectStore->getContainer($_ENV['CONTAINER']);
    $object = $container->getObject($_ENV['FILENAME']);

    dump('Before $object->download() : '.uptime());

    $stream = $object->download();

    dump('After $object->download() : '.uptime());
    dump($stream);
    dump('Before reading the stream : '.uptime());

    while (!$stream->eof()) {
        $stream->read(1024);
    }

    dump('After reading the stream : '.uptime());
}
