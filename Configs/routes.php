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

return array
(
    '/' => 'Main::index',

    '/license' => 'License::index',

    '/method' => 'Method::index',

    '/method.get/{id:[0-9]+}' => 'Method::get'

);