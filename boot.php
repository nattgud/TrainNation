<?php
ini_set('session.cookie_httponly', 1);
session_name("trainnation");
session_start();
if(isset($_GET["p"])) {
	$_SESSION["p"] = $_GET["p"];
} elseif(!isset($_SESSION["p"])) {
	$_SESSION["p"] = "git";
}
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/vs2015.min.css">
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/default.min.css"> -->
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/languages/xml.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/languages/css.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/languages/javascript.min.js"></script>
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
		<div id="medalNotice">
			<div>
				<span class="material-symbols-outlined">person</span>
				<h3>Titel</h3>
			</div>
			<p>Beskrivning</p>
		</div>
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
							"js4",
							"jsloop"
						],
						// "html" => [
						// 	"html1"
						// ]
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
			<div id="user"><?php
		if(isset($_SESSION["user"]) === false) {
?><button id="loginButton"><span class="material-symbols-outlined">login</span></button><?php } else { ?><button id="loginButton"><span class="material-symbols-outlined">person</span></div><?php } ?></div>
		</header>
		<div id="totalCenter"><?php
		if(isset($_SESSION["user"]) === false) {
?>
			<div id="form_login" class="loginForm">
				<form>
					<h3>Logga in</h3>
					<input type="email" placeholder="Epost" id="form_login_mail" required>
					<input type="password" placeholder="Lösenord" id="form_login_pass" required>
					<button id="loginSubmitButton" type="button">Logga in</button><button id="loginRegButton" type="button">Registrera</button>
				</form>
			</div>
			<div id="form_reg" class="loginForm">
				<form>
					<h3>Registrera dig</h3>
					<input type="email" placeholder="Epost" id="form_reg_mail" required>
					<input type="password" placeholder="Lösenord" id="form_reg_pass" required>
					<p>Tänk på att alla steg du gjort kommer nollställas när du loggar in på ett nytt konto!</p>
					<button id="regSubmitButton" type="button">Registrera</button><button id="regLoginButton" type="button">Logga in</button>
				</form>
			</div><?php
} else {
?>
			<div id="form_login" class="loginForm">
				<form>
					<h3>Mitt konto!</h3>
					<div class="table2r">
						<div>Epost</div><div><?php echo $_SESSION["user"]["mail"]; ?></div>
						<div>Byt lösenord</div><div><input type="password" id="userPassword" placeholder="Nytt lösenord"></div>
						<div>Bekräfta</div><div><input type="password" id="userPassword2" placeholder="Bekräfta nyt lösenord"></div>
						<div>Medaljer</div><div id="userMedals"></div>
					</div>
					<p>Logga ut <button id="logoutButton"><span class="material-symbols-outlined">logout</span></button></p>
				</form>
			</div>
<?php
}
?>
		</div>
		<div id="progress"><div id="line"></div></div>
		<main>