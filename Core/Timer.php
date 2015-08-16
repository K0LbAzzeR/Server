<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru> https://mofsy.ru
 * @copyright     Copyright (c) 2015, Oleg Budrin (Mofsy)
 */

namespace Armature\Core;

interface iTimer
{
    public function start();
    public function pauseStart();
    public function pauseStop();
    public function getTime();
}

class Timer implements iTimer {

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