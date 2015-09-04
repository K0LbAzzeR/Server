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