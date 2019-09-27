<?php
session_start();
abstract class Controller {
protected abstract function render();
protected abstract function before();
	
public function Request($action) {
		$this->before();
		$this->$action();   //$this->action_index
		$this->render();
	}

protected function IsGet() {
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}

protected function IsPost()	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}

protected function Template($fileName, $vars = [])	{ //функция для вывода данных в верстку
		foreach ($vars as $key => $val)	{ //переменные для шаблона
			$$key = $val;
		}
		ob_start(); //генерация HTML
		include "$fileName";
		return ob_get_clean();	
	}	

public function __call($name, $params){ //если вызывается не существующая функция
        die('Ошибка! Страница не найдена!');
	}
}
