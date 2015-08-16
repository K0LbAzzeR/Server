<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru> https://mofsy.ru
 * @copyright     Copyright (c) 2015, Oleg Budrin (Mofsy)
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