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

interface RequestInterface
{
    public function isPost();
    public function isGet();
    public function isPut();
    public function isHead();
    public function isDelete();
    public function isSecure();
    public function isOptions();
    public function isPatch();
    public function isAjax();
    public function isMethod();

    public function has($key);
    public function hasGet($key);
    public function hasPost($key);
    public function hasPort($port);
    public function hasContentType($type);

    public function getUserAgent();
    public function getClientIp();
    public function getHeaders();
    public function getScheme();
    public function getPut();
    public function getPost();
    public function getGet();
    public function getRequestUri();
    public function getBaseURL();
    public function getPort();
    public function getContentType();

    public function setBaseUrl($url);
}
