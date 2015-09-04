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