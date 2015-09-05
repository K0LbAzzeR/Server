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

interface MainInterface
{
    public function loadConfig();
    public function loadRouter();

    public function listen();
}

class Main implements MainInterface {

    private $config;

    private $router;

    public function __construct()
    {
        $this->loadConfig();
        $this->loadRouter();
    }

    public function loadConfig()
    {
        $this->config = (new Config())->setDir(CONFIGS_DIR)->load();
    }

    public function loadRouter()
    {
        $this->router = new Router();
    }

    public function listen()
    {
        var_dump($this);
    }
}