<?
	class DB{
		
		private static $intance;
		private static $connection;
		const DB_HOST = "localhost";
		const DB_NAME = "frelancer";
		const DB_USER = "root";
		const DB_PASSWORD = "123";
		private function __construct(){
			self::$connection = new PDO("mysql:dbname=".self::DB_NAME.";host=".self::DB_HOST,
			self::DB_USER,self::DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		}
		
		public static function getInstance(){
			if (empty(self::$intance)) {
				self::$intance = new DB();
			}
			return self::$intance;
		}
		
		public static function getConn(){
			self::getInstance();
			return self::$connection;
		}
		
		public static function prepare($sql) {
			return self::getConn()->prepare($sql);
		}
		
		public static function lastInsertId() {
			return self::getConn()->lastInsertId();
		}
	
		public static function beginTransaction(){
			return self::getConn()->beginTransaction();
		}
		
		public static function commit() {
			return self::getConn()->commit();
		}
		
		public static function rollBack() {
			return self::getConn()->rollBack();
		}
		
		
	}
	//$bd = new DB();