<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Simulator</title>
		<link rel="stylesheet" href="frame.css">
		<script src="frame.js?r=<?php echo rand(0, 9999); ?>"></script>
	</head>
	<body>
<?php
if(isset($_GET["t"])) {
	if($_GET["t"] === "blank") {
?>
<main>
	<h1>Resultat</h1>
	<p>När du kör din kod så syns resultatet här!</p>
</main>
<?php
	} elseif($_GET["t"] === "error") {
		$msg = json_decode($_GET["e"]);
		echo "<style> body { background-color: #a00; color: #ff0; } </style><h1>Koden kan inte köras!</h1><p>Fixa felet så att koden kan köras!</p><code>".$msg->error."</code>";
	} else {
		echo "<p>Något gick fel.</p>";
	}
} elseif(isset($_GET["c"])) {
	if($_GET["c"] !== "") {
?>
		<code></code>
		<script>
			window.onerror = function(e) {
				_________msg("error", JSON.stringify({
					error: e,
					code: <?php echo json_encode($_GET["c"]); ?>
				}));
				return false;
			};
		</script>
<?php
		require_once("levels.php");
		$level = false;
		if(isset($_GET["l"])) {
			if($_GET["l"] !== "") {
				$level = intval($_GET["l"]);
			}
		}
		if(substr($_SESSION["p"], 0, 2) == "js") {
?>
		<script>
			// try {
			// 	eval(`<?php //echo rawurldecode($_GET["c"]); ?>`);
			// } catch(e) {
			// 	_________trueLog(e);
			// }
		</script>
		<script>
<?php
		
		if(isset($leveldata[$level])) {
			if($leveldata[$level]["type"] !== "text") {
				echo rawurldecode($_GET["c"]);
			}
			if($leveldata[$level]["type"] === "var") {
				echo "
_________TRAINJS_RESULT(".$leveldata[$level]["variables"].");";
			} elseif($leveldata[$level]["type"] === "text") {
				echo "
_________TRAINJS_RESULT_T(".json_encode(rawurldecode($_GET["c"])).");";
			} elseif($leveldata[$level]["type"] === "log") {
				echo "
_________TRAINJS_RESULT_LOGCHECK();";
			}
		}
?>
		</script>
<?php
		} elseif($_SESSION["p"] === "html") {
?>

<script>
_________TRAINJS_RESULT_H();
</script>
<?php
		}
	} else {
		echo "<p>Något gick fel.</p>";
	}
}
?>
	</body>
</html>