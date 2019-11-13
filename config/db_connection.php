<?php 
	class DBConnection {
		private $host = "localhost";
		private $dbName = "a";
		private $username = "root";
		private $password = "";
		public function connection() {
			try {
				$dsn = "mysql:host=$this->host;dbname=$this->dbName";
				$options = array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				);
				$conn = new PDO($dsn, $this->username, $this->password, $options);
				return $conn;
			} catch (PDOException $e) {
				die("Connection fail: " . $e->getMessage());
			}
		}
	}

 ?>