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

namespace Armature\Handlers;


use Armature\Core\Handler;


class License extends Handler {

	public function create()
	{

	}

	public function delete()
	{

	}

	public function update()
	{

	}

	public function generate()
	{
		$key = md5(time().mt_rand(1,5));
		$new_key = '';

		for ($i = 1; $i <= 25; $i++)
		{
			$new_key .= $key[$i];
			if ($i % 5 === 0 && $i !== 25)
			{
				$new_key .= '-';
			}
		}

		return strtoupper($new_key);
	}
}