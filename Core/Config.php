<?php
/**
 * Armature
 *
 * @link          https://github.com/Armature
 * @author        Oleg Budrin <ru.mofsy@yandex.ru> https://mofsy.ru
 * @copyright     Copyright (c) 2015, Oleg Budrin (Mofsy)
 */

namespace Armature\Core;


interface iConfig
{
	public function setDir($dir);
}

class Config implements iConfig {

	private $global;

	/*
	 * Директория с конфигурациями
	 */
	private $dir;

	public $get;

	/*
	 * Конструктор класса
	 */
	public function __construct()
	{
		$this->setDir(CONFIGS_DIR);
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
		$iterator = new \DirectoryIterator($this->getDir());

		foreach ($iterator as $file)
		{
			if($file->isFile())
			{
				$this->global[$file->getBasename('.php')] = include $file->getPathname();
			}
		}
	}
}