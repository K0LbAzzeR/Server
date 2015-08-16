<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru> https://mofsy.ru
 * @copyright     Copyright (c) 2015, Oleg Budrin (Mofsy)
 */

namespace Armature\Core;


interface iLogger
{
}


class Logger implements iLogger {

    const INFO = 'Information';

    const WARN = 'Warning';

    const CRIT = 'Critical';

    public function __construct()
    {
    }

    public function crit($message, $exception = null)
    {
        $this->log($message, self::CRIT, $exception);
    }

    public function info($message, $exception = null)
    {
        $this->log($message, self::INFO, $exception);
    }

    public function warn($message, $exception = null)
    {
        $this->log($message, self::WARN, $exception);
    }

    private function parseException(Exception $exception)
    {
        return "{file:{$exception->getFile()}, line:{$exception->getLine()}, message:\"{$exception->getMessage()}\", trace:\"{$exception->getTraceAsString()}\"}";
    }

    private function log($description, $level, $exception = null)
    {
        $additional = '';
        if($exception instanceof Exception)
        {
            $additional = $this->parseException($exception);
        }

        error_log("{level:{$level}, description:\"{$description}\", additional:{$additional}}");
    }
}