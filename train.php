<?php
require_once("boot.php");
?>
<section>
	<div id="loadingWindow">
		<h1>Laddar!</h1>
		<p>Vänta lite så kommer det en fråga här!</p>
	</div>
	<div id="trainWindow">
		<h1><span class="material-symbols-outlined">train</span><?php
if(isset($levelGroups[$_SESSION["p"]])) {
	echo $levelGroups[$_SESSION["p"]];
} else {
	echo "Nation";
}
?><span id="levelTitle"></span> <a href="#" target="_blank" id="docs" class="material-symbols-outlined" style="display: none;">dictionary</a></h1>
		<div id="question"></div>
		<div id="codewindow">
			<span id="codeLinenumbers"><?php
for($c = 1; $c < 1000; $c++) {
	echo "<span id=\"codeRow".$c."\">".$c."</span>";
}			
?></span>
			<code></code>
		</div>
		<div id="alts"></div>
		<button id="runButton" disabled>Kör kod</button>
	</div>
	<div id="doneWindow">
		<h1>Klar!</h1>
		<p>Det var allt som fanns här! <?php
		$next = false;
		foreach($levelGroups as $k => $v) {
			if($k === $_SESSION["p"]) {
				continue;
			}
			if(isset($_COOKIE["train_level_".$k]) === true) {
				if(intval($_COOKIE["train_level_".$k]/count($levels[$k])) !== 1) {
					$next = $k;
					break;
				}
			}
		}
		if($next === false) {
			echo "Testa gärna någon av de andra delarna!";
		} else {
			echo "Testa gärna någon annan del, t ex <a href=\"train.php?p=".$next."\">".$levelGroups[$next]."</a>";
		}
?></p>
	</div>
	<div>
		<button id="backLevel"><span class="material-symbols-outlined">chevron_backward</span></button>
		<button id="resetLevel"><span class="material-symbols-outlined">replay</span></button>
	</div>
</section>
<section>
	<iframe src="files/frame.php?t=blank" sandbox="allow-scripts" style="display: none;"></iframe>
</section>
<?php
require_once("footer.php");
?>