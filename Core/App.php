<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru> https://mofsy.ru
 * @copyright     Copyright (c) 2015, Oleg Budrin (Mofsy)
 */

namespace Armature\Core;


class App {

	/*
	 * Объект запроса
	 */
	public $request = null;

	/*
	 * Объект ответа
	 */
	public $response = null;

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

	/*
	 * Тело ответа
	 */
	public function setResponse($response)
	{
		if(is_object($response))
		{
			$this->response = $response;
			return true;
		}
		return false;
	}

	private function auth()
	{


	}
}