<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru> https://mofsy.ru
 * @copyright     Copyright (c) 2015, Oleg Budrin (Mofsy)
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
	 */
	private $method;

	/*
	 * Путь запроса без параметров
	 */
	public $request;

	/*
	 * Конструктор класса
	 */
	public function __construct()
	{
		$this->setEnv($_SERVER);

		$this->request = parse_url($this->environ['REQUEST_URI'])['path'];
		$this->setMethod($this->environ['REQUEST_METHOD']);
		$this->checkAjax();
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
	public function checkAjax()
	{
		if(isset($this->environ['HTTP_X_REQUESTED_WITH']) && strtolower($this->environ['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
		{
			$this->ajax = true;
		}
		return $this->ajax;
	}

}