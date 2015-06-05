<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru> https://mofsy.ru
 * @copyright     Copyright (c) 2015, Oleg Budrin (Mofsy)
 */

define('ROOT_DIR', __DIR__);
define('CORE_DIR', __DIR__ . '/Core');
define('HANDLERS_DIR', __DIR__ . '/Handlers');

/*
 * Автозагрузчик
 */
require CORE_DIR . '/Loader.php';
$loader = new \Armature\Core\Loader;
$loader->register();

$loader->addNamespace('Armature\Core', CORE_DIR);
$loader->addNamespace('Armature\Handlers', HANDLERS_DIR);

$request = new Armature\Core\Request();
$response = new Armature\Core\Response();
$app = new Armature\Core\App();

/*
 * Запускаем сервер
 */
$app->setRequest($request);
$app->setResponse($response);
$app->run();



var_dump($request);
var_dump($response);
var_dump($app);