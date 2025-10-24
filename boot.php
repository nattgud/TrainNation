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
	"js3" =>	"JS if",
];
?>
<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>TrainNation</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
		<link rel="stylesheet" href="files/style.css">
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
			<h2><span class="material-symbols-outlined">train</span>Nation</h2>
			<nav>
				<ul>
					<li><a href=".">Hem</a></li><?php
					require_once("files/leveldata.php");
					foreach($levelGroups as $k => $v) {
						$done = "";
						if((intval($_COOKIE["train_level_".$k]) / count($levels[$k])) === 1) {
							$done = " <span class=\"material-symbols-outlined\">done</span>";
						}
						echo '<li><a href="train.php?p='.$k.'" id="menuItem'.$k.'">'.$v.$done.'</a></li>';
					}
					?>
				</ul>
			</nav>
		</header>
		<div id="progress"><div id="line"></div></div>
		<main>