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

define('DEBUG', true);
define('VERSION', '0.1.0');
define('ROOT_DIR', __DIR__);
define('CORE_DIR', __DIR__ . '/Core');
define('HANDLERS_DIR', __DIR__ . '/Handlers');
define('CONFIGS_DIR', __DIR__ . '/Configs');

require CORE_DIR . '/Loader.php';

(new Armature\Core\Loader())
    ->register()
    ->addNamespace('Armature\Core', CORE_DIR)
    ->addNamespace('Armature\Handlers', HANDLERS_DIR);

(new Armature\Core\Main())
    ->listen();