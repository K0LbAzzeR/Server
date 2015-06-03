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
	public $env = array();

	/*
	 * Аякс запрос
	 */
	public $ajax = false;

	/*
	 * Метод запроса
	 */
	public $method;


	/*
	 * Конструктор класса
	 */
	public function __construct($env)
	{
		$this->setEnv($env);
		$this->setMethod($this->env['REQUEST_METHOD']);
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
		$this->env = $env;
	}

	/*
	 * Получение окружения
	 */
	public function getEnv()
	{
		return $this->env;
	}

	/*
	 * Проверка на аякс запрос
	 */
	public function checkAjax()
	{
		if(isset($this->env['HTTP_X_REQUESTED_WITH']) && strtolower($this->env['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
		{
			$this->ajax = true;
		}
		return $this->ajax;
	}

}