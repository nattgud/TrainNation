<?php
session_name("trainjs");
session_start();
require_once("leveldata.php");
if(!isset($_SESSION["p"])) {
	$_SESSION["p"] = "git";
}
$leveldata = $levels[$_SESSION["p"]];
if(isset($_GET["level"])) {
	if(isset($leveldata[intval($_GET["level"])])) {
		if(isset($_GET["type"])) {
			if($_GET["type"] === "typecheck") {
				echo json_encode([
					"type" =>		$leveldata[intval($_GET["level"])]["type"]
				]);
			} elseif($_GET["type"] === "gen") {
				echo json_encode([
					"q" =>		$leveldata[intval($_GET["level"])]["text"],
					"code" =>	$leveldata[intval($_GET["level"])]["code"],
					"type" =>	$leveldata[intval($_GET["level"])]["type"],
					"progress" =>	[intval($_GET["level"]), count($leveldata)],
					"docs" =>	(isset($leveldata[intval($_GET["level"])]["docs"]))?$leveldata[intval($_GET["level"])]["docs"]:"",
					"alts" =>	(isset($leveldata[intval($_GET["level"])]["alts"]))?$leveldata[intval($_GET["level"])]["alts"]:[]
				]);
			} elseif($_GET["type"] === "answer") {
				$ret = [
					"status" =>	"error",
					"msg" =>	"Något gick fel"
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
									} elseif($answer === $guess) {
										$ret["status"] =	true;
										$ret["msg"] =		"Helt rätt!";
									} elseif(strtolower($answer) === strtolower($guess)) {
										$ret["status"] =	"wrong";
										$ret["msg"] =		"Har du skrivit helt rätt? Tänk på stora och små bokstäver. '".$answer."' + '".$guess."'";
									} else {
										$ret["status"] =	"wrong";
										$ret["msg"]	=		"Det var tyvärr fel. Försök igen!";
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
									//$ret["msg"] = json_encode($ret["msg"]);
									if($ok === true) {
										$ret["status"] =	true;
										$ret["msg"] =		"Helt rätt!";
									} else {
										$ret["status"] =	"wrong";
										$ret["msg"] =		"Det verkar tyvärr vara fel. Försök igen!";
									}
								} elseif(in_array($leveldata[intval($_GET["level"])]["type"], ["text", "alt", "input"])) {
									if(gettype($answer) === "array") {
										$check = in_array($guess, $answer, true);
										if($check === false) {
											$check = (in_array($guess, $answer))?"almost":false;
										}
									} else {
										$check = $answer === $guess;
										if($check === false) {
											$check = (strtolower($answer) === strtolower($guess))?"almost":false;
										}
									}
									if($check === "almost") {
										$ret["status"] =	"wrong";
										$ret["msg"] =		"Det var tyvärr fel. Har du tänkt på stora och små bokstäver?";
									} elseif($check === true) {
										$ret["status"] =	true;
										$ret["msg"] =		"Helt rätt!";
									} else {
										$ret["status"] =	"wrong";
										$ret["msg"] =		"Det verkar tyvärr vara fel. Försök igen!";
									}
								} else {
									$ret["msg"] = "Något verkar vara konstigt med fråga ".(intval($_GET["level"])+1).". Försök igen.";
								}
							} else {
								$ret["msg"] = "Ditt svar är tomt.";
							}
						} else {
							$ret["msg"] = "Du verkar svara på en nivå som inte finns";
						}
					}
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
		echo json_encode([
			"progress" =>	[intval($_GET["level"]), count($leveldata)],
		]);
	}
}
?>