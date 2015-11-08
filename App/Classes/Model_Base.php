<?php
namespace App\Classes;

Abstract Class Model_Base {

	protected $db;
	protected $table;
	public static $pdo;

	public function __construct() {
		if (empty(self::$pdo)) {
			self::$pdo = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
			self::$pdo->exec('SET CHARACTER SET utf8');
		}
	}

	public function redirect($page) {
		header("Location: $page");
	}

}

