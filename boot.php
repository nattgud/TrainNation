<?php
session_name("trainjs");
session_start();
if(isset($_GET["p"])) {
	$_SESSION["p"] = $_GET["p"];
} elseif(!isset($_SESSION["p"])) {
	$_SESSION["p"] = "git";
}
$levelGroups = [
	"git" =>	"Git",
	"js" =>		"JS variabler",
	"js2" =>	"JS villkor",
	"js3" =>	"JS villkor forts.",
	"jsts" =>	"JS Fel",
	"js4" =>	"JS if",
];
require_once("files/leveldata.php");
?>
<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>TrainNation</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
		<link rel="stylesheet" href="files/style.css?r=<?php echo rand(0, 9999); ?>">
<?php
if(isset($style)) {
	foreach($style as $link) {
		echo "		<link rel=\"stylesheet\" href=\"files/".$link."\">
";
	}
}
?>
		<script>
<?php
echo "const trainType = '".$_SESSION["p"]."'";
?>
		</script>
		<script src="https://cdn.jsdelivr.net/npm/acorn@8/dist/acorn.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/acorn-walk@8/dist/walk.min.js"></script>
		<script src="files/app.js?v=<?php echo rand(0, 99999); ?>"></script>
<?php
if(isset($script)) {
	foreach($script as $link) {
		echo "		<script src=\"files/".$script."\"></script>
";
	}
}
?>
	</head>
	<body>
		<div id="msg"></div>
		<header>
			<h2><a href="." title="Gå till startsidan"><span class="material-symbols-outlined">train</span>Nation</a></h2>
			<nav>
				<ul id="topMenu">
					<li><a href="truth.php">Sanningstabell</a></li><?php
					$menu = [
						"Git" => "git",
						"JavaScript" => [
							"js", 
							"js2", 
							"js3", 
							"jsts", 
							"js4"
						]
					];
					foreach($menu as $name => $main) {	// make dropdown
						if(gettype($main) !== "array") {
							$done = "";
							if((intval((isset($_COOKIE["train_level_".$main]))?$_COOKIE["train_level_".$main]:0) / count($levels[$main])) === 1) {
								$done = "<span class=\"material-symbols-outlined\">done</span>";
							}
							echo '<li><a href="train.php?p='.$main.'" id="menuItem'.$main.'">'.$name.$done.'</a></li>';
						} else {
							$totalDone = 0;
							$firstUndone = $main[0];
							foreach($main as $item) {
								$totalDone += floor(intval((isset($_COOKIE["train_level_".$item]))?intval($_COOKIE["train_level_".$item]):0) / count($levels[$item]));
								if(($firstUndone === $main[0]) && ((intval((isset($_COOKIE["train_level_".$item]))?intval($_COOKIE["train_level_".$item]):0) / count($levels[$item])) !== 1)) {
									$firstUndone = $item;
								}
							}
							$done = "";
							if($totalDone / count($main) > 0) {
								$totalDone = floor(($totalDone / count($main))*5);
								$done = $done = "<span class=\"material-symbols-outlined\">".[
									"circle",
									"clock_loader_20",
									"clock_loader_40",
									"clock_loader_60",
									"clock_loader_80",
									"done"
								][$totalDone]."</span>";
							}
							echo '<li><a href="train.php?p='.$firstUndone.'">'.$name.$done.'</a><ul>';
							foreach($main as $item) {
								$done = "";
								if((intval((isset($_COOKIE["train_level_".$item]))?$_COOKIE["train_level_".$item]:0) / count($levels[$item])) === 1) {
									$done = "<span class=\"material-symbols-outlined\">done</span>";
								}
								echo '<li><a href="train.php?p='.$item.'" id="menuItem'.$item.'">'.$levelGroups[$item].$done.'</a></li>';
							}
							echo "</li></ul>";
						}
					}
					?>
				</ul>
			</nav>
		</header>
		<div id="progress"><div id="line"></div></div>
		<main>