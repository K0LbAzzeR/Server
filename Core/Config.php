<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru> https://mofsy.ru
 * @copyright     Copyright (c) 2015, Oleg Budrin (Mofsy)
 */

namespace Armature\Core;


class Config {

	/*
	 * Директория с конфигурациями
	 */
	private $dir;

	public $get;

	/*
	 * Конструктор класса
	 */
	public function __construct($dir)
	{
		$this->setDir($dir);
		$this->load();
	}

	/*
	 * Установка директории с конигурациями
	 */
	public function setDir($dir)
	{
		$this->dir = $dir;
	}

	/*
	 * Получение директории с конфигурацими
	 */
	public function getDir()
	{
		return $this->dir;
	}

	/*
	 * Загрузка файлов конфигураций в память
	 */
	public function load()
	{
		if( $handle = opendir( $this->getDir() ) )
		{
			while ( false !== ( $file = readdir( $handle ) ) )
			{
				if ($file !== '.' && $file !== '..')
				{
					if (@file_exists($this->getDir() . "/{$file}"))
					{
						$this->global[$file] = include $this->getDir() . "/{$file}";
					}
				}
			}
			closedir( $handle );
		}
	}
}