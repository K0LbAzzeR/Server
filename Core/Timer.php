<?php
/*
  +----------------------------------------------------------------------+
  | Armature                                                             |
  +----------------------------------------------------------------------+
  | Website: http://armature.pw                                          |
  | Github: https://github.com/Armature                                  |
  | License: http://creativecommons.org/licenses/by-nc-sa/4.0/           |
  +----------------------------------------------------------------------+
  | Author: Oleg Budrin (Mofsy) <support@mofsy.ru> <https://mofsy.ru>    |
  +----------------------------------------------------------------------+
*/

namespace Armature\Core;


class Timer implements TimerInterface {

    private $start;

    private $pause;

    public function __construct($start = 0)
    {
        if($start)
        {
            $this->start();
        }
    }

    public function start()
    {
        $this->start = $this->getTime();
        $this->pause = 0;
    }

    public function pauseStart()
    {
        $this->pause = $this->getTime();
    }

    public function pauseStop()
    {
        $this->start += ($this->getTime() - $this->pause);
        $this->pause = 0;
    }

    public function get($decimals = 8)
    {
        return round(($this->getTime() - $this->start), $decimals);
    }

    public function getTime()
    {
        list($usec, $sec) = explode(' ', microtime());

        return ((float)$usec + (float)$sec);
    }
}