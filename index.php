<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru> https://mofsy.ru
 * @copyright     Copyright (c) 2015, Oleg Budrin (Mofsy)
 */

@error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
@ini_set('display_errors', true);
@ini_set('html_errors', true);
@ini_set('error_reporting', E_ALL ^ E_WARNING ^ E_NOTICE);

define('ROOT_DIR', __DIR__);
define('CORE_DIR', __DIR__ . '/Core');
define('HANDLERS_DIR', __DIR__ . '/Handlers');
define('CONFIGS_DIR', __DIR__ . '/Configs');

require CORE_DIR . '/Loader.php';
$loader = new \Armature\Core\Loader;
$loader->register();

$loader->addNamespace('Armature\Core', CORE_DIR);
$loader->addNamespace('Armature\Handlers', HANDLERS_DIR);

$request = new Armature\Core\Request();
$handler = new Armature\Core\Handler($request);
$response = new Armature\Core\Response($handler);

$response->run();

var_dump($request);
var_dump($response);
var_dump($handler);