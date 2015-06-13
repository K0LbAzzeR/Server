<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru> https://mofsy.ru
 * @copyright     Copyright (c) 2015, Oleg Budrin (Mofsy)
 */

namespace Armature\Core;


class Response {

	/*
	 * Код ответа
	 */
	public $code = 200;

	/*
	 * Content type
	 */
	public $content_type = 'application/json';

	/*
	 * Конструктор класса
	 */
	public function __construct(App $response)
	{

	}
}