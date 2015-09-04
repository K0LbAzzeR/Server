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


interface iHandler
{

}


class Handler implements iHandler {

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