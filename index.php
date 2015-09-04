<?php
/*
  +----------------------------------------------------------------------+
  | Armature                                                             |
  +----------------------------------------------------------------------+
  | Website: http://armature.pw                                          |
  | Github: https://github.com/Armature                                  |
  +----------------------------------------------------------------------+
  | Author: Oleg Budrin (Mofsy) <support@mofsy.ru> <https://mofsy.ru>    |
  +----------------------------------------------------------------------+
*/

@error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
@ini_set('display_errors', true);
@ini_set('html_errors', true);
@ini_set('error_reporting', E_ALL ^ E_WARNING ^ E_NOTICE);

define('VERSION', '0.1.0');
define('ROOT_DIR', __DIR__);
define('CORE_DIR', __DIR__ . '/Core');
define('HANDLERS_DIR', __DIR__ . '/Handlers');
define('CONFIGS_DIR', __DIR__ . '/Configs');

require CORE_DIR . '/Loader.php';

$loader = (new Armature\Core\Loader())
    ->register()
    ->addNamespace('Armature\Core', CORE_DIR)
    ->addNamespace('Armature\Handlers', HANDLERS_DIR);

$timer = new Armature\Core\Timer(1);

$config = (new Armature\Core\Config())
    ->setDir(CONFIGS_DIR)
    ->load();

$request = new Armature\Core\Request();
$response = new Armature\Core\Response();

$handler = new Armature\Core\Handler($request);

$response->make();

echo $timer->get();

// "ловим" строку запроса, превращаем её в масив
$routeArray = explode('/', $_SERVER['REQUEST_URI']);
// удаляем пустые элементы массива (элементы образованные начальным и конечным слэшами URI)
// тут можно было обойтить array_shift и array_pop - но мне способ с foreach кажется более "универсальным"
$route = array();
foreach ($routeArray as $value) {
    if (!empty($value)) {
        $route[] = trim($value);
    }

}
// вводим в адресную строку всякий бред, смотрим что нам показывают
echo "<pre>";
print_r($route);
echo "</pre>";

var_dump($request);
var_dump($handler);
var_dump($response);
var_dump($config);
