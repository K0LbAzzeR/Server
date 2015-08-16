<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru> https://mofsy.ru
 * @copyright     Copyright (c) 2015, Oleg Budrin (Mofsy)
 */

namespace Armature\Core;


interface iResponse
{
	public function setCode($code);
	public function setHeader($header);
}


class Response implements iResponse {

	/**
	 * @var array HTTP status codes
	 */
	public $status = array(
		100 => 'Continue',
		101 => 'Switching Protocols',
		200 => 'OK',
		201 => 'Created',
		202 => 'Accepted',
		203 => 'Non-Authoritative Information',
		204 => 'No Content',
		205 => 'Reset Content',
		206 => 'Partial Content',
		300 => 'Multiple Choices',
		301 => 'Moved Permanently',
		302 => 'Found',
		303 => 'See Other',
		304 => 'Not Modified',
		305 => 'Use Proxy',
		306 => '(Unused)',
		307 => 'Temporary Redirect',
		400 => 'Bad Request',
		401 => 'Unauthorized',
		402 => 'Payment Required',
		403 => 'Forbidden',
		404 => 'Not Found',
		405 => 'Method Not Allowed',
		406 => 'Not Acceptable',
		407 => 'Proxy Authentication Required',
		408 => 'Request Timeout',
		409 => 'Conflict',
		410 => 'Gone',
		411 => 'Length Required',
		412 => 'Precondition Failed',
		413 => 'Request Entity Too Large',
		414 => 'Request-URI Too Long',
		415 => 'Unsupported Media Type',
		416 => 'Requested Range Not Satisfiable',
		417 => 'Expectation Failed',
		500 => 'Internal Server Error',
		501 => 'Not Implemented',
		502 => 'Bad Gateway',
		503 => 'Service Unavailable',
		504 => 'Gateway Timeout',
		505 => 'HTTP Version Not Supported',
		509 => 'Bandwidth Limit Exceeded'
	);

	/*
	 * Код ответа
	 */
	public $code = 200;

	/*
	 * Content type
	 */
	public $content_type = 'application/json';

	/*
	 * Тело ответа
	 */
	public $body;

	/*
	 * Конструктор класса
	 */
	public function __construct(Handler $handler)
	{

	}

	/*
	 * Запускаем ответ
	 */
	public function run()
	{



	}


	/*
	 * Устанавливаем заголовок HTTP ответа
	 */
	public function setHeader($header)
	{
		header($header);
	}

	/*
	 * Устанавливаем код HTTP ответа
	 */
	public function setCode($code)
	{
		http_response_code($code);
	}


}