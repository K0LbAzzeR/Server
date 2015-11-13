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


class Request {

	/*
	 * Переменные окружения
	 */
	public $environ = array();

	/*
	 * Маркер Ajax
	 */
	public $ajax = false;

	/*
	 * Метод запроса
	 *
	 * GET
	 * POST
	 * HEAD
	 * DELETE
	 * PUT
	 * PATCH
	 * OPTIONS
	 */
	private $method;

	/*
	 * Разрешенные методы
	 */
	private $method_allow = array('GET', 'POST', 'PUT', 'DELETE');

	/*
	 * Путь запроса без параметров
	 */
	public $request;

	/*
	 * Пусть
	 */
	public $path;

	/*
	 * Конструктор класса
	 */
	public function __construct()
	{
		$this->setEnv($_SERVER);

		$this->request = parse_url($this->environ['REQUEST_URI'])['path'];
		$this->setMethod($this->environ['REQUEST_METHOD']);
		$this->isAjax();
	}

	/*
	 * Получение метода запроса
	 */
	public function getMethod()
	{
		return $this->method;
	}

	/*
	 * Установка метода запроса
	 */
	public function setMethod($method)
	{
		$this->method = $method;
	}

	/*
	 * Установка окружения
	 */
	public function setEnv($env)
	{
		$this->environ = $env;
	}

	/*
	 * Установка параметров GET запроса
	 */
	public function setGet($get)
	{

	}

	/*
	 * Установка POST запроса
	 */
	public function setPost($post)
	{

	}

	/*
	 * Получение окружения
	 */
	public function getEnv()
	{
		return $this->environ;
	}

	/*
	 * Проверка на аякс запрос
	 */
	public function isAjax()
	{
		if(isset($this->environ['HTTP_X_REQUESTED_WITH']) && strtolower($this->environ['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
		{
			$this->ajax = true;
		}
		return $this->ajax;
	}


	public function has($key)
	{
		return array_key_exists($key, $_REQUEST);
	}

	public function hasPost($key)
	{
		return array_key_exists($key, $_POST);
	}

	public function hasGet($key)
	{
		return array_key_exists($key, $_GET);
	}
}