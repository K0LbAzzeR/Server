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

namespace Armature\Core;


use Armature\Handlers;


class Main implements MainInterface {

    private $config;

    private $router;

    public function __construct() {}

    public function loadConfig()
    {
        $this->config = (new Config())->setDir(CONFIGS_DIR)->load();

        return $this;
    }

    public function loadRouter()
    {
        $this->router = new Router();

        return $this;
    }

    public function listen()
    {
        var_dump($this);
    }
}