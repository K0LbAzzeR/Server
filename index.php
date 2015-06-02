<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru>
 * @author_link  https://mofsy.ru
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
$app = new Armature\Core\App($request);

/*
 * Запускаем сервер
 */
$app->run();