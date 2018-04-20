<?php
error_reporting(0);

	class Mysql {

		public $host;
		public $user;
		public $password;
		public $database;
		public $link;

		public function setHost($host) {
			$this->host = $host;
		}

		public function setUser($user) {
			$this->user = $user;
		}

		public function setPassword($password) {
			$this->password = $password;
		}

		public function setDatabase($database) {
			$this->database = $database;
		}

		public function connect() {
			$this->link = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($this->link->connect_error) {
		    	die("Connection failed: " . $this->link->connect_error);
			} 
			    echo "Connected successfully";
		}
	}



	class Sqlite {

		public $host;
		public $user;
		public $password;
		public $database;
		public $link;

		public function setHost($host) {
			$this->host = $host;
		}

		public function setUser($user) {
			$this->user = $user;
		}

		public function setPassword($password) {
			$this->password = $password;
		}

		public function setDatabase($database) {
			$this->database = $database;
		}

		public function connect() {
			try {
			    $this->link = new PDO("sqlite:host=$this->host;dbname=$this->database", $this->user, $this->password);
			    
			    $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			    echo "Connected successfully"; 
			    }
			catch(PDOException $e)
			    {
			    echo "Connection failed: " . $e->getMessage();
			    }
		}
	}


	/*
===========================================================

Object factory class

===========================================================
*/

	class Database {

		public static $driver;
		public static $link;

		public static function setDriver($driver) {
			self::$driver = $driver;
		}

		public static function setConnection($host, $user, $password, $database) {
			if(self::$driver == "mysql") {
				$mysqlOb = new Mysql();
				$mysqlOb->setHost($host);
				$mysqlOb->setUser($user);
				$mysqlOb->setPassword($password);
				$mysqlOb->setDatabase($database);
				$mysqlOb->connect();

				
			}
			elseif (self::$driver == "sqlite") {
				$sqliteOb = new Sqlite();
				$sqliteOb->setHost($host);
				$sqliteOb->setUser($user);
				$sqliteOb->setPassword($password);
				$sqliteOb->setDatabase($database);
				$sqliteOb->connect();
			}
		}


	}

/*
===========================================================

Call the methods

===========================================================
*/

	Database::setDriver("mysql");

	Database::setConnection("localhost", "root", "", "hackalgo");



?>