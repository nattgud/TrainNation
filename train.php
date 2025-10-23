<?php
require_once("boot.php");
?>
<section>
	<div>
		<h1><span class="material-symbols-outlined">train</span><?php
$levelNames = [
	"git" =>	"Git",
	"js" =>		"JavaScript"
];
if(isset($levelNames[$_SESSION["p"]])) {
	echo $levelNames[$_SESSION["p"]];
} else {
	echo "Nation";
}
?><span id="levelTitle"></span> <a href="#" target="_blank" id="docs" class="material-symbols-outlined" style="display: none;">dictionary</a></h1>
		<div id="question"></div>
		<code></code>
		<div id="alts"></div>
		<button id="runButton" disabled>Kör kod</button>
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