<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru> https://mofsy.ru
 * @copyright     Copyright (c) 2015, Oleg Budrin (Mofsy)
 */

namespace Armature\Handlers;


class License {

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