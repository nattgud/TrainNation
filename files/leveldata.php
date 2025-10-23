<?php
$levels = [
	"git" => [
		[
			"text" =>		"Vad skriver du i terminalen för att använda git?",
			"code" =>		'¤kommando¤', 
			"type" =>		"text",
			"answer" =>		"git"
		],[
			"text" =>		"Hur kontrollerar du vilken version av git du använder?",
			"docs" =>		"https://www.w3schools.com/git/git_install.asp?remote=github",
			"code" =>		'git ¤kommando¤', 
			"type" =>		"text",
			"answer" =>		"git --version"
		],[
			"text" =>		"Hur initierar vi en repository lokalt med git?",
			"docs" =>		"https://www.w3schools.com/git/git_getstarted.asp?remote=github",
			"code" =>		'git ¤kommando¤', 
			"type" =>		"text",
			"answer" =>		"git init"
		],[
			"text" =>		"Vad skriver du för att stage'a index.html så att du sen kan skapa en commit med den?",
			"docs" =>		"https://www.w3schools.com/git/git_staging_environment.asp?remote=github",
			"code" =>		'git ¤kommando¤ index.html', 
			"type" =>		"text",
			"answer" =>		"git add index.html"
		],[
			"text" =>		"Vad skriver du för att stage'a alla ändrade filer?",
			"docs" =>		"https://git-scm.com/cheat-sheet",
			"code" =>		'git add ¤kommando¤', 
			"type" =>		"text",
			"answer" =>		[
				"git add .",
				"git add --all",
				"git add -A"
			]
		],[
			"text" =>		"Vad skriver du för att skapa en första commit?",
			"docs" =>		"https://www.w3schools.com/git/git_commit.asp?remote=github",
			"code" =>		'git ¤kommando¤ -m "Initial commit"', 
			"type" =>		"text",
			"answer" =>		"git commit -m \"Initial commit\""
		],[
			"text" =>		"Skapa en commit med alla stage'ade filer",
			"docs" =>		"https://www.w3schools.com/git/git_commit.asp?remote=github",
			"code" =>		'git ¤kommando¤ ¤parameter till kommandot¤ ¤¤Initial commit¤¤', 
			"type" =>		"text",
			"answer" =>		"git commit -m \"Initial commit\""
		],[
			"text" =>		"Vad skriver du om du vill kontrollera i vilken branch du är och ifall det finns några väntande commits?",
			"docs" =>		"https://www.w3schools.com/git/git_workflow.asp?remote=github#git-status",
			"code" =>		'git ¤kommando¤', 
			"type" =>		"text",
			"answer" =>		"git status"
		],[
			"text" =>		"Om du är på en annan branch och behöver gå till \"main\". Vad skriver du?",
			"docs" =>		"https://www.w3schools.com/git/git_branch.asp?remote=github",
			"code" =>		'git ¤kommando¤ main', 
			"type" =>		"text",
			"answer" =>		[
				"git checkout main",
				"git switch main"
			]
		],[
			"text" =>		"Du är på \"main\"-branch och behöver byta till branch \"frontend\". Vad skriver du?",
			"docs" =>		"https://www.w3schools.com/git/git_branch.asp?remote=github",
			"code" =>		'git ¤kommando¤ ¤branch¤', 
			"type" =>		"text",
			"answer" =>		[
				"git checkout frontend",
				"git switch frontend"
			]
		],[
			"text" =>		"Vad skriver du om du har gjort en commit och ska \"skicka iväg den\" till GitHub?",
			"docs" =>		"https://www.w3schools.com/git/git_push_to_remote.asp?remote=github",
			"code" =>		'git ¤kommando¤ origin main', 
			"type" =>		"text",
			"answer" =>		"git push origin main"
		],[
			"text" =>		"Om du har förändringar i GitHub som du inte har lokalt, hur hämtar du hem dem?",
			"docs" =>		"https://www.w3schools.com/git/git_pull_from_remote.asp?remote=github",
			"code" =>		'git ¤kommando¤ origin main', 
			"type" =>		"text",
			"answer" =>		"git pull origin main"
		],[
			"text" =>		"Vad skriver du för att se alla branches i nuvarande repository?",
			"docs" =>		"https://www.w3schools.com/git/git_branch.asp?remote=github",
			"code" =>		'git ¤kommando¤', 
			"type" =>		"text",
			"answer" =>		"git branch"
		],[
			"text" =>		"En kollega har skapat ett repository. Du har fått adressen och behöver kopiera den till din lokala utvecklingsmiljö. Vad skriver du?",
			"docs" =>		"https://www.w3schools.com/git/git_branch.asp?remote=github",
			"code" =>		'git ¤kommando¤ https://github.com/colleagueUsername/reponame.git', 
			"type" =>		"text",
			"answer" =>		"git clone https://github.com/colleagueUsername/reponame.git"
		],[
			"text" =>		"Du behöver kolla tidigare commits och se vem som commit'at vad. Vad skriver du?",
			"docs" =>		"https://www.w3schools.com/git/git_history.asp?remote=github",
			"code" =>		'git ¤kommando¤', 
			"type" =>		"text",
			"answer" =>		"git log"
		]
	],
	"js" => [
		[
			"text" =>		"Skriv ut något i konsollen.",
			"docs" =>		"https://www.w3schools.com/jsref/met_console_log.asp",
			"code" =>		'console.log("¤Meddelande¤");', 
			"type" =>		"log",
			"answer" =>		"*"
		],[
			"text" =>		"Skriv ut något i konsollen.",
			"docs" =>		"https://www.w3schools.com/jsref/met_console_log.asp",
			"code" =>		'¤variabel¤.¤funktion¤("¤Meddelande¤");', 
			"type" =>		"log",
			"answer" =>		"*"
		],[
			"text" =>		"Sätt variabeln a till värdet 5.",
			"docs" =>		"https://www.w3schools.com/js/js_let.asp",
			"code" =>		'let a = ¤Value¤;', 
			"type" =>		"var",
			"variables" =>	"{'a':a}",
			"answer" =>		["a" => 5]
		],[
			"text" =>	"Skapa variabeln a och sätt värdet till 2.",
			"docs" =>	"https://www.w3schools.com/js/js_let.asp",
			"code" =>	'¤nyckelord¤ ¤variabelNamn¤ = ¤Value¤;',
			"type" =>	"var",
			"variables" =>	"{'a':a}",
			"answer" =>	["a" => 2]
		],[
			"text" =>	"Skriv ut värdet från variabeln a till konsollen.",
			"docs" =>	"https://www.w3schools.com/jsref/met_console_log.asp",
			"code" =>	'let a = 5;<br>¤variabel¤.¤funktion¤(¤Meddelande¤);',
			"type" =>	"log",
			"answer" =>	5
		],
		[
			"text" =>	"Skapa en variabel b och sätt den till 10.",
			"docs" =>	"https://www.w3schools.com/js/js_let.asp",
			"code" =>	'let b = ¤input¤;',
			"type" =>	"var",
			"variables" => "{'b':b}",
			"answer" =>	["b" => 10]
		],
		[
			"text" => "Ge variablerna a och b värden så att summan som skrivs ut är 15.",
			"docs" => "https://www.w3schools.com/js/js_let.asp",
			"code" => 'const a = ¤input¤;<br>const b = ¤input¤;<br>console.log(a + b);',
			"type" => "log",
			"answer" => 15
		],
		[
			"text" => "Skapa en variabel c och sätt den till 7.",
			"docs" => "https://www.w3schools.com/js/js_let.asp",
			"code" => 'let ¤namn¤ = ¤input¤;',
			"type" => "var",
			"variables" => "{'c':c}",
			"answer" => ["c" => 7]
		],
		[
			"text" => "Vilket kodord används för att skapa en variabel du kan ändra värdet på?",
			"docs" => "https://www.w3schools.com/js/js_let.asp",
			"code" => '¤nyckelord¤ variabelNamn = "Ett värde";',
			"type" => "text",
			"answer" => "let variabelNamn = \"Ett värde\";"
		],
		[
			"text" => "Vilket kodord används för att skapa en variabel du <b>INTE</b> kan ändra värdet på?",
			"docs" => "https://www.w3schools.com/js/js_let.asp",
			"code" => '¤nyckelord¤ variabelNamn = "Ett värde";',
			"type" => "text",
			"answer" => "const variabelNamn = \"Ett värde\";"
		],
		[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => '5;',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Nummer"
		],
		[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => '"Hallå!";',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Sträng"
		],
		[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => '[2];',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Array"
		],
		[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => '"5";',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Sträng"
		],
		[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => 'true;',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Boolean"
		],
		[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => '["2"];',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Array"
		],
		[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => 'false;',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Boolean"
		],
		[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => '["false"];',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Array"
		],
		[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => '{index0: "abc"};',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Objekt"
		],
		[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => '"true";',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Sträng"
		],
		[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => '[true];',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Array"
		],
		[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => '{rad1: 5};',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Objekt"
		],
		



		[
			"text" => "Skapa en variabel c och se till att det får värdet 7.",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => 'let ¤namn¤ = ¤input¤;',
			"type" => "var",
			"variables" => "{'c':c}",
			"answer" => ["c" => 7]
		],
		[
			"text" => "Skapa en variabel a och se till att det är en sträng.",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => 'let a = ¤input¤;',
			"type" => "vartype",
			"variables" => "{'a':a}",
			"answer" => ["a" => "string"]
		]
	],
	"html" =>	[		// Fixa validering och krav
		[
			"text" => "Skapa ett div-element!",
			"code" => '¤¤',
			"type" => "element",
			"variables" => "{'d':div}",
			"answer" => ["d"=>"<div></div>"]
		]
	]
];
?>