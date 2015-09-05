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


interface HandlerInterface
{

}


abstract class Handler implements HandlerInterface {

	/*
	 * Объект запроса
	 */
	public $request = null;

	/*
	 * Конфигурация
	 */
	public $config = null;

	/*
	 * Конструктор класса
	 */
	public function __construct(Request $request)
	{

	}

	/*
	 * Запускаем приложение
	 */
	public function run()
	{
		$this->auth();
	}

	/*
	 * Тело запроса
	 */
	public function setRequest($request)
	{
		if(is_object($request))
		{
			$this->request = $request;
			return true;
		}
		return false;
	}

	private function auth()
	{


	}
}