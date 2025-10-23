<?php
session_name("trainjs");
session_start();
if(isset($_GET["p"])) {
	$_SESSION["p"] = $_GET["p"];
} elseif(!isset($_SESSION["p"])) {
	$_SESSION["p"] = "git";
}
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
					<li><a href=".">Hem</a></li><li><a href="train.php?p=git">Git</a></li><li><a href="train.php?p=js">JavaScript</a></li>
				</ul>
			</nav>
		</header>
		<div id="progress"><div id="line"></div></div>
		<main>