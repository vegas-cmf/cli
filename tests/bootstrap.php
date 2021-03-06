<?php
error_reporting(E_ALL);
//Test Suite bootstrap
include __DIR__ . "/../vendor/autoload.php";

use Phalcon\Loader;

define('TESTS_ROOT_DIR', dirname(__FILE__));
$configArray = require_once TESTS_ROOT_DIR . '/fixtures/app/config/config.php';

$_SERVER['HTTP_HOST'] = 'vegas.dev';
$_SERVER['REQUEST_URI'] = '/';

$config = new \Phalcon\Config($configArray);
$di = new \Phalcon\DI\FactoryDefault\CLI();

$di->set('config', $config);
$di->set('collectionManager', function() use ($di) {
    return new \Phalcon\Mvc\Collection\Manager();
}, true);
$di->set('mongo', function() use ($config) {
    $mongo = new \MongoClient();
    return $mongo->selectDb($config->mongo->db);
}, true);
$di->set('modelManager', function() use ($di) {
    return new \Phalcon\Mvc\Model\Manager();
}, true);
$di->set('db', function() use ($config) {
    return new \Phalcon\Db\Adapter\Pdo\Mysql($config->db->toArray());
}, true);

Phalcon\DI::setDefault($di);