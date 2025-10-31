<?php
/*

"type" => "code",
"answer" => [
	[
		"type" => "if",
		"condition" => [
			"left" => [
				"value" => 1
			],
			"op" => "==",
			"right" => [
				"name" => "a"
			]
		],
			"else" => true
	], 
	[
		"type" => "for",
		"init" => [
			"name" => "a",
			"value" => 1
		],
		"condition" => [
			"left" => ["name" => "a"],
			"op" => "<=",
			"right" => ["value" => 9]
		],
		"update" => [
			"operator" => "--",
			"name" => "a"
		]
	]
]

*/
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
			"text" =>		"Spara värdet 2 i variabeln a.",
			"docs" =>		"https://www.w3schools.com/js/js_let.asp",
			"code" =>		'let a ¤operator¤ 2;', 
			"type" =>		"var",
			"variables" =>	"{'a':a}",
			"answer" =>		["a" => 2]
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
			"docs" => "https://www.w3schools.com/js/js_const.asp",
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
			"text" => "Fixa koden så att 7 skrivs ut!",
			"docs" => "https://www.w3schools.com/js/js_arithmetic.asp",
			"code" => 'const a = 3;<br>const b = 4;<br>console.log(a ¤operator¤ b);',
			"type" => "log",
			"answer" => 7
		],
		[
			"text" => "Fixa koden så att 1 skrivs ut!",
			"docs" => "https://www.w3schools.com/js/js_arithmetic.asp",
			"code" => 'const a = 4;<br>const b = 3;<br>console.log(a ¤operator¤ b);',
			"type" => "log",
			"answer" => 1
		],
		[
			"text" => "Fixa koden så att 4 skrivs ut!",
			"docs" => "https://www.w3schools.com/js/js_arithmetic.asp",
			"code" => 'const a = 8;<br>const b = 2;<br>console.log(a ¤operator¤ b);',
			"type" => "log",
			"answer" => 4
		],
		[
			"text" => "Fixa koden så att 9 skrivs ut!",
			"docs" => "https://www.w3schools.com/js/js_arithmetic.asp",
			"code" => 'const a = 3;<br>console.log(a ¤operator¤ a);',
			"type" => "log",
			"answer" => 9
		],
		[
			"text" => "Fixa koden så att 5 skrivs ut!",
			"docs" => "https://www.w3schools.com/js/js_arithmetic.asp",
			"code" => 'let a = 4;<br>a¤operator¤;<br>console.log(a);',
			"type" => "log",
			"answer" => 5
		],
		[
			"text" => "Fixa koden så att 4 skrivs ut!",
			"docs" => "https://www.w3schools.com/js/js_arithmetic.asp",
			"code" => 'let a = 5;<br>a¤operator¤;<br>console.log(a);',
			"type" => "log",
			"answer" => 4
		]
		// [	// FIXA VARTYPE
		// 	"text" => "Skapa en variabel a och se till att det är en sträng.",
		// 	"docs" => "https://www.w3schools.com/js/js_types.asp",
		// 	"code" => 'let a = ¤input¤;',
		// 	"type" => "vartype",
		// 	"variables" => "{'a':a}",
		// 	"answer" => ["a" => "string"]
		// ]
	], 
	"js2" => [
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 == 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '2 == 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '"1" == 3;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 == "1";',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'true == 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '0 == false;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 == false;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 === 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '"4" === 4;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'true === 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 > 2;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 < 2;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 < 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 > 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '"2" > 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '"2" < 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '2 > true;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'true > 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '2 <= 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '3 >= 3;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'true > 0;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'true <= 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 != 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 != 5 && 3 < 9;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '3 == 3 || 3 >= 9;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '"3" == 2 || 3 >= 9;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '"2" === 2 || 1 > 0.99;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '((5+5) <= 10 && 1 === true) || 2 === "2,0";',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '0 == true == 0;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'true + true < 2;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 / 0 >= Infinity;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],
		[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'Math.PI == 3.14;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],
	], 
	"js3" => [
		[
			"text" => "Vad är resultatet av: age > maxAgeLimit ?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'const age = 28;<br>let maxAgeLimit = 30;<br><br>const isStudent = true;<br>const scoreText = "28";<br><br>maxAgeLimit = 35;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av: age === scoreText ?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'const age = 28;<br>let maxAgeLimit = 30;<br><br>const isStudent = true;<br>const scoreText = "28";<br><br>maxAgeLimit = 35;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av: age == scoreText ?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'const age = 28;<br>let maxAgeLimit = 30;<br><br>const isStudent = true;<br>const scoreText = "28";<br><br>maxAgeLimit = 35;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av: isStudent || (maxAgeLimit < 20) ?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'const age = 28;<br>let maxAgeLimit = 30;<br><br>const isStudent = true;<br>const scoreText = "28";<br><br>maxAgeLimit = 35;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av: !isStudent && (age > 25) ?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'const age = 28;<br>let maxAgeLimit = 30;<br><br>const isStudent = true;<br>const scoreText = "28";<br><br>maxAgeLimit = 35;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är värdet på maxAgeLimit efter att all kod har körts (Ange som nummer)?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'const age = 28;<br>let maxAgeLimit = 30;<br><br>const isStudent = true;<br>const scoreText = "28";<br><br>maxAgeLimit = 35;',
			"type" => "input",
			"answer" => "35"
		],[
			"text" => 'Vad är resultatet av: totalScore == "105" ?',
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'const userPoints = 100;<br>let adminLevel = 5;<br><br>const statusMsg = "false";<br>const maxAttempts = 10;<br><br>let totalScore = userPoints + adminLevel;<br><br>adminLevel = 7;<br>let hasPermission = totalScore > 100 && adminLevel >= 7;<br>// hasPermission = (105 > 100) && (7 >= 7) = true && true = true<br><br>const dataArray = [10];<br>const dataRef = [10];',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => 'Vad är resultatet av: dataArray === dataRef ?',
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'const userPoints = 100;<br>let adminLevel = 5;<br><br>const statusMsg = "false";<br>const maxAttempts = 10;<br><br>let totalScore = userPoints + adminLevel;<br><br>adminLevel = 7;<br>let hasPermission = totalScore > 100 && adminLevel >= 7;<br>// hasPermission = (105 > 100) && (7 >= 7) = true && true = true<br><br>const dataArray = [10];<br>const dataRef = [10];',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => 'Vad är resultatet av: statusMsg === "false" ?',
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'const userPoints = 100;<br>let adminLevel = 5;<br><br>const statusMsg = "false";<br>const maxAttempts = 10;<br><br>let totalScore = userPoints + adminLevel;<br><br>adminLevel = 7;<br>let hasPermission = totalScore > 100 && adminLevel >= 7;<br>// hasPermission = (105 > 100) && (7 >= 7) = true && true = true<br><br>const dataArray = [10];<br>const dataRef = [10];',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => 'Vad är resultatet av: adminLevel > maxAttempts && statusMsg === "false" ?',
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'const userPoints = 100;<br>let adminLevel = 5;<br><br>const statusMsg = "false";<br>const maxAttempts = 10;<br><br>let totalScore = userPoints + adminLevel;<br><br>adminLevel = 7;<br>let hasPermission = totalScore > 100 && adminLevel >= 7;<br>// hasPermission = (105 > 100) && (7 >= 7) = true && true = true<br><br>const dataArray = [10];<br>const dataRef = [10];',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => 'Vad är resultatet av: (userPoints - 100) === 0 || maxAttempts < adminLevel ?',
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'const userPoints = 100;<br>let adminLevel = 5;<br><br>const statusMsg = "false";<br>const maxAttempts = 10;<br><br>let totalScore = userPoints + adminLevel;<br><br>adminLevel = 7;<br>let hasPermission = totalScore > 100 && adminLevel >= 7;<br>// hasPermission = (105 > 100) && (7 >= 7) = true && true = true<br><br>const dataArray = [10];<br>const dataRef = [10];',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => 'Vad är värdet på hasPermission efter att all kod har körts?',
			"docs" => "https://www.w3schools.com/js/js_operators.asp",
			"code" => 'const userPoints = 100;<br>let adminLevel = 5;<br><br>const statusMsg = "false";<br>const maxAttempts = 10;<br><br>let totalScore = userPoints + adminLevel;<br><br>adminLevel = 7;<br>let hasPermission = totalScore > 100 && adminLevel >= 7;<br>// hasPermission = (105 > 100) && (7 >= 7) = true && true = true<br><br>const dataArray = [10];<br>const dataRef = [10];',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => 'Vad exakt är värdet på totalScore?',
			"docs" => "https://www.w3schools.com/js/js_operators.asp",
			"code" => 'const baseScore = 100;<br>let modifier = "10";<br>const multiplier = 3;<br>let userLevel = 0;<br>const isAdmin = false;<br>const nullVar = null;<br>let undefinedVar;<br><br>const totalScore = baseScore + modifier * multiplier;',
			"type" => "input",
			"answer" => '130'
		],[
			"text" => 'Vad exakt är värdet på displayScore?',
			"docs" => "https://www.w3schools.com/js/js_operators.asp",
			"code" => 'const baseScore = 100;<br>let modifier = "10";<br>const multiplier = 3;<br>let userLevel = 0;<br>const isAdmin = false;<br>const nullVar = null;<br>let undefinedVar;<br><br>const displayScore = baseScore + modifier;',
			"type" => "input",
			"answer" => ['"10010"', "'10010'", "`10010`"]
		],[
			"text" => 'Vad är resultatet (true/false) av canAccess?',
			"docs" => "https://www.w3schools.com/js/js_operators.asp",
			"code" => 'const baseScore = 100;<br>let modifier = "10";<br>const multiplier = 3;<br>let userLevel = 0;<br>const isAdmin = false;<br>const nullVar = null;<br>let undefinedVar;<br><br>const canAccess = isAdmin && userLevel > 0;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => 'Vad är det exakta värdet på setting?',
			"docs" => "https://www.w3schools.com/js/js_operators.asp",
			"code" => 'const baseScore = 100;<br>let modifier = "10";<br>const multiplier = 3;<br>let userLevel = 0;<br>const isAdmin = false;<br>const nullVar = null;<br>let undefinedVar;<br><br>const setting = "Admin" && 0 && "User";',
			"type" => "input",
			"answer" => '0'
		],[
			"text" => 'Vad är resultatet av boolCheck?',
			"docs" => "https://www.w3schools.com/js/js_operators.asp",
			"code" => 'const baseScore = 100;<br>let modifier = "10";<br>const multiplier = 3;<br>let userLevel = 0;<br>const isAdmin = false;<br>const nullVar = null;<br>let undefinedVar;<br><br>const boolMath = true + true;<br>const boolCheck = (boolMath == "2");',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => 'Vad är resultatet av nullCheck?',
			"docs" => "https://www.w3schools.com/js/js_operators.asp",
			"code" => 'const baseScore = 100;<br>let modifier = "10";<br>const multiplier = 3;<br>let userLevel = 0;<br>const isAdmin = false;<br>const nullVar = null;<br>let undefinedVar;<br><br>const nullCheck = (nullVar == 0);',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => 'Vad är resultatet av undefCheck?',
			"docs" => "https://www.w3schools.com/js/js_operators.asp",
			"code" => 'const baseScore = 100;<br>let modifier = "10";<br>const multiplier = 3;<br>let userLevel = 0;<br>const isAdmin = false;<br>const nullVar = null;<br>let undefinedVar;<br><br>const undefCheck = (nullVar == undefinedVar);',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => 'Vad är resultatet av nanCheck?',
			"docs" => "https://www.w3schools.com/js/js_operators.asp",
			"code" => 'const baseScore = 100;<br>let modifier = "10";<br>const multiplier = 3;<br>let userLevel = 0;<br>const isAdmin = false;<br>const nullVar = null;<br>let undefinedVar;<br><br>const notNum = baseScore * "abc";<br>const nanCheck = (notNum == notNum);',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		]
	], 
	"jsts" => [
		[
			"text" => "Vilken typ av fel har uppstått i koden?",
			"docs" => "https://www.w3schools.com/js/js_errors_intro.asp",
			"code" => 'if (true console.log("hej"));',
			"type" => "alt",
			"alts" => ["Reference Error", "Type Error", "Range Error", "Syntax Error"],
			"answer" => "Syntax Error"
		],[
			"text" => "Vilken typ av fel har uppstått i koden?",
			"docs" => "https://www.w3schools.com/js/js_errors_intro.asp",
			"code" => 'function loop(){<br>   loop();<br>}<br>loop();',
			"type" => "alt",
			"alts" => ["Reference Error", "Type Error", "Range Error", "Syntax Error"],
			"answer" => "Range Error"
		],[
			"text" => "Vilken typ av fel har uppstått i koden?",
			"docs" => "https://www.w3schools.com/js/js_errors_intro.asp",
			"code" => 'let num = 123;<br>num();',
			"type" => "alt",
			"alts" => ["Reference Error", "Type Error", "Range Error", "Syntax Error"],
			"answer" => "Type Error"
		],[
			"text" => "Vilken typ av fel har uppstått i koden?",
			"docs" => "https://www.w3schools.com/js/js_errors_intro.asp",
			"code" => 'var x = ;',
			"type" => "alt",
			"alts" => ["Reference Error", "Type Error", "Range Error", "Syntax Error"],
			"answer" => "Syntax Error"
		],[
			"text" => "Vilken typ av fel har uppstått i koden?",
			"docs" => "https://www.w3schools.com/js/js_errors_intro.asp",
			"code" => 'console.log(abc);',
			"type" => "alt",
			"alts" => ["Reference Error", "Type Error", "Range Error", "Syntax Error"],
			"answer" => "Reference Error"
		],[
			"text" => "Vilken typ av fel har uppstått i koden?",
			"docs" => "https://www.w3schools.com/js/js_errors_intro.asp",
			"code" => 'function foo() {<br>   return x;<br>}<br>foo();',
			"type" => "alt",
			"alts" => ["Reference Error", "Type Error", "Range Error", "Syntax Error"],
			"answer" => "Reference Error"
		],[
			"text" => "Vilken typ av fel har uppstått i koden?",
			"docs" => "https://www.w3schools.com/js/js_errors_intro.asp",
			"code" => 'let f;<br>f();',
			"type" => "alt",
			"alts" => ["Reference Error", "Type Error", "Range Error", "Syntax Error"],
			"answer" => "Type Error"
		],[
			"text" => "Vilken typ av fel har uppstått i koden?",
			"docs" => "https://www.w3schools.com/js/js_errors_intro.asp",
			"code" => 'let arr = new Array(-5);',
			"type" => "alt",
			"alts" => ["Reference Error", "Type Error", "Range Error", "Syntax Error"],
			"answer" => "Range Error"
		],[
			"text" => "Vilken typ av fel har uppstått i koden?",
			"docs" => "https://www.w3schools.com/js/js_errors_intro.asp",
			"code" => 'let x = null;<br>console.log(x.name);',
			"type" => "alt",
			"alts" => ["Reference Error", "Type Error", "Range Error", "Syntax Error"],
			"answer" => "Type Error"
		],[
			"text" => "Vilken typ av fel har uppstått i koden?",
			"docs" => "https://www.w3schools.com/js/js_errors_intro.asp",
			"code" => 'function test() {<br>   console.log("hej");',
			"type" => "alt",
			"alts" => ["Reference Error", "Type Error", "Range Error", "Syntax Error"],
			"answer" => "Syntax Error"
		]
	],
	"js4" => [
		[
			"text" => "Såhär skapar du en enkel if-sats där villkoret är ifall numret 1 är samma värde och datatyp som det andra värdet 1. Det finns även en kopplad else till if-satsen. I varje del finns en console.log för att skriva ut antingen Sant eller Falskt.",
			"docs" => "https://www.w3schools.com/js/js_if_else.asp",
			"code" => 'if(1 === 1) {<br>   console.log("Sant");<br>} else {<br>   console.log("Falskt");<br>}',
			"type" => "info"
		],[
			"text" => "Vilket kodord används för att kontrollera ifall ett villkor stämmer för att i så fall utföra något?",
			"docs" => "https://www.w3schools.com/js/js_if.asp",
			"code" => '¤kodord¤',
			"type" => "text",
			"answer" => "if"
		],[
			"text" => "Vad skrivs ut?",
			"docs" => "https://www.w3schools.com/js/js_if_else.asp",
			"code" => 'if(true) {<br>   console.log("A");<br>} else {<br>   console.log("B");<br>}',
			"type" => "alt",
			"alts" =>	["A", "B"],
			"answer" => "A"
		],[
			"text" => "Skriv en kod som kontrollerar ifall a är mer än b.",
			"docs" => "https://www.w3schools.com/js/js_if.asp",
			"code" => 'const a = 5;<br>const b = 4;<br>¤kodord¤(¤variabelNamn¤ ¤operator¤ ¤variabelNamn¤) {<br>   console.log("Korrekt");<br>} else {<br>   console.log("Fel");<br>}',
			"type" => "log",
			"answer" => "Korrekt"
		],[
			"text" => "Vad heter kodordet som saknas?.",
			"docs" => "https://www.w3schools.com/js/js_if_else.asp",
			"code" => 'if(5 === "5") {<br>   console.log("Sant");<br>} ¤kodord¤ {<br>   console.log("Falskt");<br>}',
			"type" => "keyword",
			"answer" => 'else'
		],[
			"text" => "Vad kommer skrivas ut?",
			"docs" => "https://www.w3schools.com/js/js_if_else.asp",
			"code" => 'if(true) {<br>   console.log("Första");<br>}<br>if(true) {<br>   console.log("Andra");<br>}',
			"type" => "alt",
			"alts" => ['"Första"', '"Andra"', '"Första" sen "Andra"', '"Andra" sen "Första"'],
			"answer" => '"Första" sen "Andra"'
		],[
			"text" => "Vilken if-sats är säkrast när man får data från en databas man själv inte utvecklat?",
			"docs" => "https://www.w3schools.com/js/js_if_else.asp",
			"code" => 'const a = fetchFromDB();<br>if(a) {<br>   console.log("Alternativ A");<br>}<br>if(a === true) {<br>   console.log("Alternativ B");<br>}',
			"type" => "alt",
			"alts" =>	["Första if-satsen", "Andra if-satsen"],
			"answer" => "Andra if-satsen"
		],[
			"text" => "Skriv en kod som innehåller en if-sats och en kopplad else-sats. Villkor etc väljer du själv.",
			"docs" => "https://www.w3schools.com/js/js_if_else.asp",
			"code" => '¤if(1 == a) {<br>   console.log("test";<br>}¤',
			"type" => "code",
			"answer" => [
				[
					"type" => "if",
					"else" => true
				]
			]
		]
		
	]
	// "html" =>	[		// Fixa validering och krav
	// 	[
	// 		"text" => "Skapa ett div-element!",
	// 		"code" => '¤¤',
	// 		"type" => "element",
	// 		"variables" => "{'d':div}",
	// 		"answer" => ["d"=>"<div></div>"]
	// 	]
	// ]
];
?>