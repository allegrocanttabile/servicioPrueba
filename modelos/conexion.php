<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=wienerst_tecnico",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}
