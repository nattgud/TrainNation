<?php
ini_set('session.cookie_httponly', 1);
session_name("trainnation");
session_start();
require_once("leveldata.php");
require_once("sql.php");
if(!isset($_SESSION["p"])) {
	$_SESSION["p"] = "git";
}
$leveldata = $levels[$_SESSION["p"]];
if(isset($_GET["level"])) {
	if(isset($leveldata[intval($_GET["level"])])) {
		if(isset($_GET["type"])) {
			if($_GET["type"] === "typecheck") {
				echo json_encode([
					"type" =>		$leveldata[intval($_GET["level"])]["type"],
					"checks" =>		(in_array($leveldata[intval($_GET["level"])]["type"], ["code", "tree"]))?$leveldata[intval($_GET["level"])]["answer"]:[]
				]);
			} elseif($_GET["type"] === "gen") {
				if($leveldata[intval($_GET["level"])]["type"] === "tree") {
					$codeoutput = htmlspecialchars($leveldata[intval($_GET["level"])]["code"]);
				} else {
					$codeoutput = $leveldata[intval($_GET["level"])]["code"];
				}
				$types = [];
				foreach($leveldata as $v) {
					array_push($types, ($v["type"] === "info")?true:false);
				}
				echo json_encode([
					"q" =>		$leveldata[intval($_GET["level"])]["text"],
					"code" =>	$codeoutput,
					"type" =>	$leveldata[intval($_GET["level"])]["type"],
					"progress" =>	[intval($_GET["level"]), count($leveldata)],
					"types" =>	$types,
					"docs" =>	(isset($leveldata[intval($_GET["level"])]["docs"]))?$leveldata[intval($_GET["level"])]["docs"]:"",
					"alts" =>	(isset($leveldata[intval($_GET["level"])]["alts"]))?$leveldata[intval($_GET["level"])]["alts"]:[],
					"lang" =>	(isset($leveldata[intval($_GET["level"])]["lang"]))?$leveldata[intval($_GET["level"])]["lang"]:""
				]);
				if(isset($_SESSION["p"]) && isset($_GET["level"])) {
					if(isset($_SESSION["levelstart_".$_SESSION["p"]."_".intval($_GET["level"])]) === false) {
						$_SESSION["levelstart_".$_SESSION["p"]."_".intval($_GET["level"])] = microtime(true);
					}
					if(isset($_SESSION["leveltries_".$_SESSION["p"]."_".intval($_GET["level"])]) === false) {
						$_SESSION["leveltries_".$_SESSION["p"]."_".intval($_GET["level"])] = 0;
					}
				}
			} elseif($_GET["type"] === "answer") {
				function updScore() {
					$ret = false;
					if(isset($_SESSION["user"])) {
						if(isset($_SESSION["p"]) && isset($_GET["level"])) {
							global $leveldata;
							if($leveldata[intval($_GET["level"])]["type"] !== "info") {
								if(isset($_SESSION["leveltries_".$_SESSION["p"]."_".intval($_GET["level"])]) && isset($_SESSION["levelstart_".$_SESSION["p"]."_".intval($_GET["level"])])) {
									$data = sql::get("SELECT id FROM users WHERE mail = :m;", [":m" => $_SESSION["user"]["mail"]]);
									if(isset($data[0])) {
										if($data[0] !== false) {
											$uid = $data[0]["id"];
											$data = sql::get("SELECT * FROM answers WHERE uid = :uid AND cat = :cat AND lvl = :lvl;", [
												":uid" =>	$uid,
												":cat" =>	$_SESSION["p"],
												":lvl" =>	intval($_GET["level"])
											]);
											if(isset($data[0]) === false) {
												$ok = sql::set("INSERT INTO answers (uid, cat, lvl, duration, tries) VALUES(:uid, :cat, :lvl, :dur, :tries);", [
													":uid" =>	$uid,
													":cat" =>	$_SESSION["p"],
													":lvl" =>	intval($_GET["level"]),
													":dur" =>	microtime(true) - $_SESSION["levelstart_".$_SESSION["p"]."_".intval($_GET["level"])],
													":tries" =>	$_SESSION["leveltries_".$_SESSION["p"]."_".intval($_GET["level"])]
												]);
												if(isset($ok[0])) {
													if($ok[0] === true) {
														$ret = true;
													}
												}
											} else {
												$ret = $data;
											}
											unset($_SESSION["levelstart_".$_SESSION["p"]."_".intval($_GET["level"])]);
											unset($_SESSION["leveltries_".$_SESSION["p"]."_".intval($_GET["level"])]);
										}
									}
								}
							}
						}
					}
					return $ret;
				}
				function addTry() {
					if(isset($_SESSION["p"]) && isset($_GET["level"])) {
						if(isset($_SESSION["leveltries_".$_SESSION["p"]."_".intval($_GET["level"])]) === true) {
							$_SESSION["leveltries_".$_SESSION["p"]."_".intval($_GET["level"])]++;
						}
					}
				}
				$ret = [
					"status" =>	"error",
					"msg" =>	"Något gick fel",
					"time" =>	false
				];
				if(isset($_GET["answer"])) {
					if(isset($leveldata[intval($_GET["level"])]["answer"])) {
						$answer = $leveldata[intval($_GET["level"])]["answer"];
						if(isset($_GET["answer"])) {
							if($_GET["answer"] !== "") {
								$guess = json_decode($_GET["answer"]);
								if($leveldata[intval($_GET["level"])]["type"] === "log") {
									if($answer === "*") {
										$ret["status"] =	true;
										$ret["msg"] =		"Rätt!";
										$ret["time"] =		updScore();
									} elseif($answer === $guess) {
										$ret["status"] =	true;
										$ret["msg"] =		"Helt rätt!";
										$ret["time"] =		updScore();
									} elseif(strtolower($answer) === strtolower($guess)) {
										$ret["status"] =	"wrong";
										$ret["msg"] =		"Har du skrivit helt rätt? Tänk på stora och små bokstäver. '".$answer."' + '".$guess."'";
										addTry();
									} else {
										$ret["status"] =	"wrong";
										$ret["msg"]	=		"Det var tyvärr fel. Försök igen!";
										addTry();
									}
								} elseif($leveldata[intval($_GET["level"])]["type"] === "var") {
									$correct = ($answer);
									$ok = true;
									foreach($correct as $k => $v) {
										if(isset($guess->$k)) {
											if(json_encode($guess->$k) != json_encode($v)) {
												$ok = false;
												break;
											}
										} else {
											$ok = false;
										}
									}
									if($ok === true) {
										$ret["status"] =	true;
										$ret["msg"] =		"Helt rätt!";
										$ret["time"] =		updScore();
									} else {
										$ret["status"] =	"wrong";
										$ret["msg"] =		"Det verkar tyvärr vara fel. Försök igen!";
										addTry();
									}
								} elseif(in_array($leveldata[intval($_GET["level"])]["type"], ["text", "alt", "input", "keyword"])) {
									if(gettype($answer) === "array") {
										if(gettype($guess) === "array") {
											$check = true;
											foreach($guess as $g) {
												if(in_array($g, $answer, true) === false) {
													$check = false;
													break;
												}
												
											}
										} else {
											$check = in_array($guess, $answer, true);
											if($check === false) {
												$check = (in_array($guess, $answer))?"almost":false;
											}
										}
									} else {
										if(gettype($guess) === "array") {
											$check = true;
											foreach($guess as $g) {
												if($g !== $answer) {
													$check = false;
													break;
												}
											}
										} else {
											$check = $answer === $guess;
											if($check === false) {
												$check = (strtolower($answer) === strtolower($guess))?"almost":false;
											}
										}
									}
									if($check === "almost") {
										$ret["status"] =	"wrong";
										$ret["msg"] =		"Det var tyvärr fel. Har du tänkt på stora och små bokstäver?";
										addTry();
									} elseif($check === true) {
										$ret["status"] =	true;
										$ret["msg"] =		"Helt rätt!";
										$ret["time"] =		updScore();
									} else {
										$ret["status"] =	"wrong";
										$ret["debug"] =		$answer;
										$ret["msg"] =		"Det verkar tyvärr vara fel. Försök igen!";
										addTry();
									}
								} elseif($leveldata[intval($_GET["level"])]["type"] === "code" && $guess === "codecorrectanswer") {
									$ret["status"] =	true;
									$ret["msg"] =		"Helt rätt!";
									$ret["time"] =		updScore();
								} else {
									$ret["msg"] = $guess." Något verkar vara konstigt med fråga ".(intval($_GET["level"])+1).". Försök igen.";
								}
							} else {
								$ret["msg"] = "Ditt svar är tomt.";
							}
						} else {
							$ret["msg"] = "Du verkar svara på en nivå som inte finns";
						}
					}
				} else if($leveldata[intval($_GET["level"])]["type"] === "info") {
					$ret["msg"] =		"ok";
					$ret["status"] =	true;
					$ret["time"] =		updScore();
				} else {
					$ret["msg"] = "Något verkar vara knas. Jag ser inget svar. Försök igen.";
				}
				echo json_encode($ret);
			} else {
				echo "false";
			}
		} else {
			echo "false";
		}
	} else {
		$types = [];
		foreach($leveldata as $v) {
			array_push($types, ($v["type"] === "info")?true:false);
		}
		echo json_encode([
			"progress" =>	[intval($_GET["level"]), count($leveldata)],
			"types" =>		$types
		]);
	}
}
?>