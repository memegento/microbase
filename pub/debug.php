<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', -1);

error_reporting(E_ALL);

use Magento\Framework\App\Bootstrap;

require dirname(__DIR__) . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$app = $bootstrap->createApplication(\Magento\Framework\App\Http::class);

$om = $bootstrap->getObjectManager();

/** @var \Magento\Framework\App\ResourceConnection $resourceConnection */
$resourceConnection = $om->get(\Magento\Framework\App\ResourceConnection::class);
$connection = $resourceConnection->getConnection();

/** @var \Memegento\TestDi\Api\MemeInterface $memeObject */
$memeObject = $om->get(\Memegento\TestDi\Api\MemeInterface::class);

echo $memeObject->memeIt('Hello World') . PHP_EOL;

print_r($connection->query('SHOW TABLES;')->fetchAll());
