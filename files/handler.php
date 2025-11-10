<?php
ini_set('session.cookie_httponly', 1);
session_name("trainnation");
session_start();
$ret = [
	"status" =>	"error",
	"msg" =>	"Något gick fel"
];
if(isset($_POST["t"])) {
	if($_POST["t"] === "login") {
		require_once("sql.php");
		if(isset($_POST["m"]) && isset($_POST["p"])) {
			if($_POST["m"] !== "" && $_POST["p"] !== "") {
				$data = sql::get("SELECT mail,pass,id FROM users WHERE mail = :m;", [
					":m" =>	$_POST["m"]
				]);
				if(isset($data[0])) {
					if($data[0] !== false) {
						if(password_verify($_POST["p"], $data[0]["pass"]) === true) {
							$ret["status"] =	"ok";
							$ret["msg"] = 		"Välkommen!";
							$_SESSION["user"] =	[
								"mail" =>	$data[0]["mail"],
								"hash" =>	md5($data[0]["mail"].$data[0]["id"])
							];
							$data = sql::get("SELECT * FROM answers WHERE uid = :uid ORDER BY cat ASC, lvl ASC;", [":uid" => $data[0]["id"]]);
							$done = [];
							require_once("leveldata.php");
							foreach($levelGroups as $cat => $d) {
								if(isset($done[$cat]) === false) {
									$done[$cat] = 0;
								}
							}
							foreach($data as $d) {
								$done[$d["cat"]]++;
							}
							foreach($levels as $cat => $v) {
								if(isset($done[$cat])) {
									if($done[$cat] !== 0) {
										foreach($v as $level) {
											if($level["type"] === "info") {
												$done[$cat]++;
											}
										}
									}
								}
							}
							$ret["r"] = $done;
							// foreach($done as $k => $d) {
							// 	if($d < 0) {
							// 		$done[$k] = 0;
							// 	}
							// }
							// $kills = [];
							// foreach($levelGroups as $cat => $d) {
							// 	$found = false;
							// 	foreach($done as $k => $d) {
							// 		if($k === $cat && $d > 0) {
							// 			$found = true;
							// 		}
							// 	}
							// 	if($found === false) {
							// 		$done[$cat] = 0;
							// 		array_push($kills, $cat);
							// 	}
							// }
							// $ret["r"] = $kills;
						}
					}
				}
			}
		}
	} elseif($_POST["t"] === "reg") {
		require_once("sql.php");
		if(isset($_POST["m"]) && isset($_POST["p"])) {
			if(strlen($_POST["m"]) >= 8 && strlen($_POST["p"]) >= 8 && str_contains($_POST["m"], "@") === true && str_contains($_POST["m"], ".") === true) {
				$data = sql::get("SELECT * FROM users WHERE mail = :m;", [
					":m" =>	$_POST["m"]
				]);
				if(!isset($data[0])) {
					$data = sql::set("INSERT INTO users(mail, pass) VALUES(:m, :p);", [
						":m" =>	$_POST["m"],
						":p" =>	password_hash($_POST["p"], PASSWORD_DEFAULT)
					]);
					if(isset($data[0])) {
						if($data[0] === true) {
							$ret["status"] =	"ok";
							$ret["msg"] = 		"Du har registrerats!";
						}
					}
				}
			} else {
				$ret["msg"] = "Du måste ha minst 8 tecken långt lösenord och epost.";
			}
		}
	} elseif($_POST["t"] === "logout") {
		unset($_SESSION["user"]);
		session_destroy();
		$ret["status"] = "ok";
		$ret["msg"] = "Du har loggats ut.";
	} elseif($_POST["t"] === "medals") {
		if(isset($_SESSION["user"])) {
			require_once("sql.php");
			$data = sql::get("SELECT id FROM users WHERE mail = :m;", [":m" => $_SESSION["user"]["mail"]]);
			if(isset($data[0])) {
				if($data[0] !== false) {
					$data = sql::get("SELECT * FROM answers WHERE uid = :uid;", [":uid" => $data[0]["id"]]);
					$medals = [];
					if(isset($data[0])) {
						if($data[0] !== false) {
							if(count($data) > 0) {
								array_push($medals, [
									"title" =>	"Initiate",
									"icon" =>	"counter_1",
									"msg" =>	"Du har svarat på din första fråga!"
								]);
							}
							foreach($data as $d) {
								if(floatval($d["duration"]) <= 3) {
									array_push($medals, [
										"title" =>	"Be quick or be dead!",
										"icon" =>	"acute",
										"msg" =>	"Du har svarat på tre sekunder eller snabbare på minst en fråga!"
									]);
									break;
								}
							}
							foreach($data as $d) {
								if(floatval($d["tries"]) >= 10) {
									array_push($medals, [
										"title" =>	"Never gonna give you up!",
										"icon" =>	"military_tech",
										"msg" =>	"Du har kämpat och löst en uppgift med 10 eller fler försök!"
									]);
									break;
								}
							}
							require_once("leveldata.php");
							$done = [];
							$ret["debug"] = $data;
							foreach($data as $d) {
								if(isset($done[$d["cat"]]) === false) {
									$done[$d["cat"]] = 0;
								}
								$done[$d["cat"]] ++;
							}
							$realLevels = [];
							foreach($levels as $k => $v) {
								if(isset($realLevels[$k]) === false) {
									$realLevels[$k] = 0;
								}
								foreach($v as $l) {
									if($l["type"] !== "info") {
										$realLevels[$k]++;
									}
								}
							}
							foreach($done as $k => $v) {
								if($v/$realLevels[$k] >= 1) {
									array_push($medals, [
										"title" =>	"Taskmaster",
										"icon" =>	"autorenew",
										"msg" =>	"Du har klarat ett helt avsnitt!"
									]);
									break;
								}
							}
							if(isset($done["js"])) {
								if($done["js"] >= 3) {
									array_push($medals, [
										"title" =>	"Hello world!",
										"icon" =>	"emoji_people",
										"msg" =>	"Du kan det första steget i alla programmeringsspråk!"
									]);
								}
								if($done["js"] >= 17) {
									array_push($medals, [
										"title" =>	"let there be light!",
										"icon" =>	"equal",
										"msg" =>	"Du har koll på hur man skapar variabler i JS!"
									]);
								}
								if($done["js"] >= 29) {
									array_push($medals, [
										"title" =>	"NaN stops me!",
										"icon" =>	"data_array",
										"msg" =>	"Du har koll på alla olika datatyper i JS!"
									]);
								}
								if($done["js"] >= 36) {
									array_push($medals, [
										"title" =>	"Hello, Operator+!",
										"icon" =>	"data_array",
										"msg" =>	"Du har koll på matematiska operatorer!"
									]);
								}
							}
							if(isset($done["js2"])) {
								if($done["js2"] >= $realLevels["js2"]) {
									array_push($medals, [
										"title" =>	"2B||!2B",
										"icon" =>	"emoji_people",
										"msg" =>	"That is the question! Och du kan svaret!"
									]);
								}
							}
							if(isset($done["js3"])) {
								if($done["js3"] >= $realLevels["js3"]) {
									array_push($medals, [
										"title" =>	"Challenger",
										"icon" =>	"crossword",
										"msg" =>	"Du har kämpat dig igenom de svåra villkoren i JavaScript!"
									]);
								}
							}
							if(isset($done["js4"])) {
								if($done["js4"] >= $realLevels["js4"]) {
									array_push($medals, [
										"title" =>	"if-ception",
										"icon" =>	"alt_route",
										"msg" =>	"if-satser är inget hinder för dig!"
									]);
								}
							}
							if(isset($done["jsloop"])) {
								if($done["jsloop"] >= $realLevels["jsloop"]) {
									array_push($medals, [
										"title" =>	"Till oändligheten och vidare!",
										"icon" =>	"all_inclusive",
										"msg" =>	"Stenkoll på loopar!"
									]);
								}
							}
							if(isset($done["jsts"])) {
								if($done["jsts"] >= $realLevels["jsts"]) {
									array_push($medals, [
										"title" =>	"Errorlog Holmes",
										"icon" =>	"frame_bug",
										"msg" =>	"Du har löst mysteriet med de felaktiga koderna!"
									]);
								}
							}
							$lengths = [];
							foreach($levelGroups as $group => $gtxt) {
								if(isset($lengths[$group]) === false) {
									$lengths[$group] = [isset($done[$group])?$done[$group]:0, count($levels[$group])];
								}
							}
							$ret["debug"] = ["done" => $done, "real" => $realLevels];
							$ret["status"] = "ok";
							// $ret["msg"] = $lengths;
							$ret["msg"] = $medals;
							// $ret["debug"] = $done;
						}
					}
				}
			}
		} else {
			$ret["status"] = "ok";
			$ret["msg"] = [];
		}
	}
}
echo json_encode($ret);
?>