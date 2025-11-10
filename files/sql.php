<?php
class sql {
	private static $con;
	public static function boot() {
		try {
			require("98q324jr98jq.php");
			self::$con = new PDO("mysql:host=localhost;dbname=train;charset=utf8", $conf[0], $conf[1]);
			// set the PDO error mode to exception
			self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return self::$con;
		} catch(PDOException $e) {
			return [false, "Connection failed: " . $e->getMessage()];
		}
	}
	public static function get($sql, $vals = []) {
		if($sql !== "") {
			try {
				self::boot();
				$q = self::$con->prepare($sql);
				foreach($vals as $k => $v) {
					$q->bindParam($k, $vals[$k]);
				}
				$q->execute();
				return $q->fetchAll(PDO::FETCH_ASSOC);
			} catch(PDOException $e) {
				return [false, "Fel vid inhämntning från databasen: " . $e->getMessage(), $sql];
			}
		} else {
			return false;
		}
	}
	public static function set($sql, $vals = []) {
		if($sql !== "") {
			try {
				self::boot();
				$q = self::$con->prepare($sql);
				foreach($vals as $k => $v) {
					$q->bindParam($k, $vals[$k]);
				}
				return [$q->execute()];
			} catch(PDOException $e) {
				return [false, "Fel vid skrivning till databasen: " . $e->getMessage(), $sql];
			}
		} else {
			return false;
		}
	}
	public static function lastID() {
		return self::$con->lastInsertId();
	}
	public static function check($val) {
		if(isset($val[0])) {
			if($val[0] === false){
				return false;
			} else {
				return true;
			}
		} else {
			return true;
		}
	}
	public static function redirect($url = "/") {
		header("Location: ".$url);
	}
}
sql::boot();
?>