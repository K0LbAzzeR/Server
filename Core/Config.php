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


interface ConfigInterface
{
	public function setDir($dir);
}

class Config implements ConfigInterface {

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
	}

	/*
	 * Установка директории с конигурациями
	 */
	public function setDir($dir)
	{
		$this->dir = $dir;

		return $this;
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

        return $this;
	}
}