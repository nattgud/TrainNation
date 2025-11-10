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
			"text" =>		"För att använda Git så behöver du åtminstone känna till ett gäng olika kommandon. Det första kommandot är att ens kunna använda Git. Alla kommandon skriver du i terminalen/kommandotolken. Ifall du använder Visual Studio Code (VS Code) så är det enklast att skriva det direkt i terminalen i programmet.",
			"code" =>		'git', 
			"type" =>		"info"
		],[
			"text" =>		"Vad skriver du i terminalen för att använda git?",
			"code" =>		'¤kommando¤', 
			"type" =>		"text",
			"answer" =>		"git"
		],[
			"text" =>		"Oftast när man vill kontrollera ifall Git verkligen blivit installerat eller inte så brukar man kontrollera vilken version man har. Det gör man på detta viset.",
			"code" =>		'git --version', 
			"type" =>		"info"
		],[
			"text" =>		"Hur kontrollerar du vilken version av git du använder?",
			"docs" =>		"https://www.w3schools.com/git/git_install.asp?remote=github",
			"code" =>		'git ¤kommando¤', 
			"type" =>		"text",
			"answer" =>		"git --version"
		],[
			"text" =>		"När du startar ett nytt projekt och vill börja använda Git kör du git init. Det talar om för Git att den här mappen ska börja övervakas, och skapar en dold struktur där alla framtida versioner sparas. Innan du kör det kommandot är din mapp bara vanlig kod, men efteråt har du ett riktigt repository.",
			"code" =>		'git init', 
			"type" =>		"info"
		],[
			"text" =>		"Hur initierar vi en repository lokalt med git?",
			"docs" =>		"https://www.w3schools.com/git/git_getstarted.asp?remote=github",
			"code" =>		'git ¤kommando¤', 
			"type" =>		"text",
			"answer" =>		"git init"
		],[
			"text" =>		'När du gjort ändringar i koden använder du git add för att markera vilka filer som ska inkluderas i nästa commit. Till exempel git add index.html style.css lägger till just de två filerna, eller git add . för att lägga till alla ändrade filer i mappen. Det är som att säga “Jag vill spara de här filerna nu”.',
			"code" =>		'git add index.html style.css', 
			"type" =>		"info"
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
			"text" =>		'För att faktiskt spara ändringarna använder du git commit. En vanlig variant är git commit -m "Kort beskrivning av ändringen", där -m låter dig skriva ett meddelande direkt i kommandoraden. Om du inte anger -m öppnas en editor där du kan skriva ett längre meddelande. Commits blir som snapshots av projektet, och meddelandet hjälper dig (och andra) att förstå vad som ändrats.',
			"code" =>		'git commit -m "Bug fixes"', 
			"type" =>		"info"
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
			"text" =>		'För att se vad som har ändrats och vilka filer som är redo för commit använder du git status. Kommandot visar vilka filer som är staged (tillagda med git add), vilka som ändrats men inte lagts till, och vilka som inte spåras av Git. Det är ett bra sätt att hålla koll på projektets läge innan du committar.',
			"code" =>		'git status', 
			"type" =>		"info"
		],[
			"text" =>		"Vad skriver du om du vill kontrollera i vilken branch du är och ifall det finns några väntande commits?",
			"docs" =>		"https://www.w3schools.com/git/git_workflow.asp?remote=github#git-status",
			"code" =>		'git ¤kommando¤', 
			"type" =>		"text",
			"answer" =>		"git status"
		],[
			"text" =>		'Om du vill byta gren eller gå tillbaka till en tidigare version använder du git checkout eller git switch. Till exempel git checkout feature-branch tar dig till grenen feature-branch. Med git switch feature-branch gör du samma sak på ett nyare och mer tydligt sätt. Du kan också använda git checkout <commit-hash> för att tillfälligt gå tillbaka till en specifik commit.',
			"code" =>		'git checkout main<br>git switch main', 
			"type" =>		"info"
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
			"text" =>		'När du vill dela dina commits med ett fjärrrepository, till exempel GitHub, använder du git push. Vanliga kommandot ser ut som git push origin main, där origin är fjärrnamnet och main är grenen du vill skicka. Det laddar upp dina lokala commits så att andra kan se dem.',
			"code" =>		'git push origin main', 
			"type" =>		"info"
		],[
			"text" =>		"Vad skriver du om du har gjort en commit och ska \"skicka iväg den\" till GitHub?",
			"docs" =>		"https://www.w3schools.com/git/git_push_to_remote.asp?remote=github",
			"code" =>		'git ¤kommando¤ origin main', 
			"type" =>		"text",
			"answer" =>		"git push origin main"
		],[
			"text" =>		'Om andra gjort ändringar i fjärrrepositoryt hämtar du dem med git pull. Exempel: git pull origin main hämtar senaste versionen från main-grenen på servern och försöker slå ihop ändringarna med din lokala kod. På så sätt håller du ditt arbete uppdaterat med resten av teamet.',
			"code" =>		'git pull origin main', 
			"type" =>		"info"
		],[
			"text" =>		"Om du har förändringar i GitHub som du inte har lokalt, hur hämtar du hem dem?",
			"docs" =>		"https://www.w3schools.com/git/git_pull_from_remote.asp?remote=github",
			"code" =>		'git ¤kommando¤ origin main', 
			"type" =>		"text",
			"answer" =>		"git pull origin main"
		],[
			"text" =>		'För att arbeta på olika idéer utan att störa huvudkoden använder du git branch. git branch feature skapar en ny gren som du kan jobba i, och git branch -d feature tar bort en gren när du är klar. Grenar låter dig experimentera och utveckla parallellt med huvudprojektet.',
			"code" =>		'git branch', 
			"type" =>		"info"
		],[
			"text" =>		"Vad skriver du för att se alla branches i nuvarande repository?",
			"docs" =>		"https://www.w3schools.com/git/git_branch.asp?remote=github",
			"code" =>		'git ¤kommando¤', 
			"type" =>		"text",
			"answer" =>		"git branch"
		],[
			"text" =>		'Om du vill börja jobba med ett redan existerande projekt använder du git clone. Till exempel git clone <i>https://github.com/användare/projekt.git</i> laddar ner hela repositoryt med all historik till din dator, så att du kan börja jobba lokalt direkt.',
			"code" =>		'git clone https://url.to.repo', 
			"type" =>		"info"
		],[
			"text" =>		"En kollega har skapat ett repository. Du har fått adressen och behöver kopiera den till din lokala utvecklingsmiljö. Vad skriver du?",
			"docs" =>		"https://www.w3schools.com/git/git_branch.asp?remote=github",
			"code" =>		'git ¤kommando¤ https://github.com/colleagueUsername/reponame.git', 
			"type" =>		"text",
			"answer" =>		"git clone https://github.com/colleagueUsername/reponame.git"
		],[
			"text" =>		'För att se vad som hänt tidigare i projektet använder du git log. Kommandot visar alla commits, vem som gjort dem, datum, och meddelanden. Du kan skriva git log --oneline för en kompakt översikt med bara commit-hash och meddelande. Det är ett bra sätt att följa projektets historik.',
			"code" =>		'git log', 
			"type" =>		"info"
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
			"text" =>		'För att skriva ut något i konsollen, till exempel ett meddelande eller en variabel, använder du console.log. Det är ett sätt att se vad som händer i koden:',
			"docs" =>		"https://www.w3schools.com/jsref/met_console_log.asp",
			"code" =>		'console.log("Hej världen!");', 
			"type" =>		"info",
			"lang" =>		"javascript"
		],[
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
			"text" =>		'För att skapa en variabel som du kan ändra använder du let. Variabeln får ett namn och kan direkt tilldelas ett värde.',
			"docs" =>		"https://www.w3schools.com/js/js_let.asp",
			"code" =>		'let a = 2;', 
			"type" =>		"info",
			"lang" =>		"javascript"
		],[
			"text" =>		'Om du istället vill skapa en variabel som inte ska kunna ändras, använder du const. Den får ett namn och ett värde, men kan inte tilldelas ett nytt värde senare:',
			"docs" =>		"https://www.w3schools.com/js/js_const.asp",
			"code" =>		'const b = 5;', 
			"type" =>		"info",
			"lang" =>		"javascript"
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
			"text" =>		'Det finns ett tredje sätt att skapa en variabel. Det tredje är <b>var</b> istället för <b>let</b> eller <b>const</b>. För att förstå skillnaden så behöver man förstå <b>block-scope</b>. Många språk, och särskilt JavaScript, har detta. <b>Block-scope</b> innebär att allting som är inuti <b>{ }</b> är inom ett "block". Variabler som är skapade med <b>let</b> och <b>const</b> finns bara inom blocket, och existerar inte utanför det. <br>Där har vi skillnaden med <b>var</b>. Ifall en variabel skapas med <b>var</b> så finns den även utanför "blocket". Det finns några enstaka tillfällen när det är rimligt, när hela programmet ska behöva komma åt en variabel. Men anledningen till varför den nästan aldrig ska användas är just eftersom <b>var</b> är som <b>let</b>; den kan ändras. Då kan allt ändra variabeln. Även besökare kan ändra variabeln genom utvecklingsverktygen i webbläsaren.',
			"docs" =>		"https://www.w3schools.com/js/js_variables.asp",
			"code" =>		'var c = 2;', 
			"type" =>		"info",
			"lang" =>		"javascript"
		],[
			"text" =>	'För att skriva ut värdet i en variabel, skickar du bara med variabeln till console.log:',
			"docs" =>	"https://www.w3schools.com/js/js_variables.asp",
			"code" =>	'let a = 5;<br>console.log(a);', 
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" =>	"Skriv ut värdet från variabeln a till konsollen.",
			"docs" =>	"https://www.w3schools.com/jsref/met_console_log.asp",
			"code" =>	'let a = 5;<br>¤variabel¤.¤funktion¤(¤Meddelande¤);',
			"type" =>	"log",
			"answer" =>	5
		],[
			"text" =>	"Skapa en variabel b och sätt den till 10.",
			"docs" =>	"https://www.w3schools.com/js/js_let.asp",
			"code" =>	'let b = ¤input¤;',
			"type" =>	"var",
			"variables" => "{'b':b}",
			"answer" =>	["b" => 10]
		],[
			"text" =>		'När du vill veta vilken typ värdet har, kan du titta på datatypen:<br><ul><li>Tal: 5</li><li>Sträng: "Hallå!"</li><li>Boolean: true eller false</li><li>Array: [2]</li><li>Objekt: {index0: "abc"}</li></ul>För enkla uträkningar används operatorer som: + - * / ++ och --.',
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" =>		'const a = 3;<br>const b = 4;<br>console.log(a + b);<br>let c = 4;<br>c++;<br>console.log(c);', 
			"type" =>		"info",
			"lang" =>		"javascript"
		],[
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
		],[
			"text" => "Vilken datatyp har värdet?",
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" => '{rad1: 5};',
			"type" => "alt",
			"alts" => ["Sträng", "Boolean", "Nummer", "Array", "Objekt"],
			"answer" => "Objekt"
		],[
			"text" =>	'En viktig sak att känna till om datatyper är att det finns andra datatyper som är mer abstrakta.<br><ul><li><b>NaN</b> är ett värde när något inte är ett nummer. Det inträffar när man försöker räkna matematik på saker som inte är matematiska. Datatypen för NaN är komiskt nog "Number".</li><li><b>undefined</b> är både ett värde och en egen datatyp. Det är helt enkelt när ett värde inte är bestämt alls.</li><li><b>null</b> är att ett värde saknas helt. Det är som att säga att "här finns inget värde" medans <b>undefined</b> mer är som att man inte ens sagt något om värdet.</lI><li><b>Infinity</b> finns också. Det är precis vad det låter som. Oändligt. Det har också datatypen <b>Number</b></li></ul>',
			"docs" => "https://www.w3schools.com/js/js_types.asp",
			"code" =>	'const notANumber = "a" * 3; // Värdet blir NaN<br>let undefinedValue; // En variabel som saknar ett värde har automatiskt värdet "undefined"<br>const nothing = null; // En variabel som representerar att det inte finns något värde.<br>const inf = Infinity; // Oändligt. T ex så är Infinity / 4 = Infinity', 
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => "Skriv klart koden så att 7 skrivs ut!",
			"docs" => "https://www.w3schools.com/js/js_arithmetic.asp",
			"code" => 'const a = 3;<br>const b = 4;<br>console.log(a ¤operator¤ b);',
			"type" => "log",
			"answer" => 7
		],[
			"text" => "Skriv klart koden så att 1 skrivs ut!",
			"docs" => "https://www.w3schools.com/js/js_arithmetic.asp",
			"code" => 'const a = 4;<br>const b = 3;<br>console.log(a ¤operator¤ b);',
			"type" => "log",
			"answer" => 1
		],
		[
			"text" => "Skriv klart koden så att 4 skrivs ut!",
			"docs" => "https://www.w3schools.com/js/js_arithmetic.asp",
			"code" => 'const a = 8;<br>const b = 2;<br>console.log(a ¤operator¤ b);',
			"type" => "log",
			"answer" => 4
		],
		[
			"text" => "Skriv klart koden så att 9 skrivs ut!",
			"docs" => "https://www.w3schools.com/js/js_arithmetic.asp",
			"code" => 'const a = 3;<br>console.log(a ¤operator¤ a);',
			"type" => "log",
			"answer" => 9
		],
		[
			"text" => "Skriv klart koden så att 5 skrivs ut!",
			"docs" => "https://www.w3schools.com/js/js_arithmetic.asp",
			"code" => 'let a = 4;<br>a¤operator¤;<br>console.log(a);',
			"type" => "log",
			"answer" => 5
		],
		[
			"text" => "Skriv klart koden så att 4 skrivs ut!",
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
			"text" =>		'I JavaScript är ett villkor ett uttryck som alltid blir <strong>true</strong> eller <strong>false</strong>.<br>Ett villkor blir true om jämförelsen eller uttrycket uppfyller kriteriet.<br>Om inte blir det false.',
			"code" =>		'1 == 1 // true<br>1 == 2 // false<br>0 == false // true<br>1 === "1" // false', 
			"type" =>		"info",
			"lang" =>		"javascript"
		],[
			"text" =>		'Operatorn == jämför värden utan att bry sig om datatypen. JavaScript försöker omvandla värdena så de går att jämföra. Detta kallas typkonvertering.',
			"code" =>		'1 == "1"<br>true == 1<br>0 == false', 
			"type" =>		"info",
			"lang" =>		"javascript"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 == 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '2 == 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '"1" == 3;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 == "1";',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'true == 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '0 == false;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 == false;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" =>	'=== jämför både värde och typ.<br>Resultatet blir true endast om både värdet och typen är exakt lika.',
			"code" =>	'1 === 1 // true<br>"4" === 4 // false<br>true === 1 // false', 
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 === 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '"4" === 4;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'true === 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" =>	'Du kan jämföra tal eller strängar för att se vilket som är större eller mindre.',
			"code" =>	'1 > 2<br>1 < 2<br>1 <= 1<br>3 >= 3<br>"2" > 1<br>true > 0', 
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 > 2;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 < 2;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 < 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 > 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '"2" > 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '"2" < 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '2 > true;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'true > 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '2 <= 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '3 >= 3;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'true > 0;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'true <= 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" =>	'!= kontrollerar ifall två värden inte är samma utan typkontroll, !== jämför både värde och typ.',
			"code" =>	'1 != 1<br>1 != 5<br>1 !== "1"', 
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 != 1;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '3 != 2;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" =>	'Operatorer för att kombinera flera villkor:<br><ul><li>&& – och, båda villkor måste vara sanna</li><li>|| – eller, minst ett villkor måste vara sant</li><li>! – inte, vänder värdet från true till false eller tvärtom</li></ul>',
			"code" =>	'1 != 5 && 3 < 9<br>3 == 3 || 3 >= 9<br>!true', 
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 != 5 && 3 < 9;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '3 == 3 || 3 >= 9;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '"3" == 2 || 3 >= 9;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '"2" === 2 || 1 > 0.99;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'true + true < 2;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => 'Math.PI == 3.14;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "false"
		],[
			"text" => "Vad är resultatet av villkoret?",
			"docs" => "https://www.w3schools.com/js/js_comparisons.asp",
			"code" => '1 / 0 >= Infinity;',
			"type" => "alt",
			"alts" => ["true", "false"],
			"answer" => "true"
		]
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
			"text" =>		'När JavaScript inte förstår koden du har skrivit uppstår ett syntaxfel. Det betyder att du har brutit mot språkets regler, som att glömma ett parentes, ett semikolon, eller skriva något på fel plats. JavaScript kan inte ens börja köra koden förrän felet är fixat.',
			"code" =>		'if(1 == 2 {<br><br>}', 
			"type" =>		"info",
			"lang" =>		"javascript"
		],[
			"text" =>		'Ett <b>Reference Error</b> betyder att du försöker använda något som inte finns. JavaScript kan inte hitta variabeln eller funktionen du nämner. Det händer ofta om du stavat fel, glömt att deklarera, eller använder något innan det skapats.',
			"code" =>		'console.log(abc); // "abc" är inte definierad<br>function foo() { return x; } foo(); // "x" finns inte', 
			"type" =>		"info",
			"lang" =>		"javascript"
		],[
			"text" =>		'Ett <b>Type Error</b> dyker upp när du försöker använda något på ett sätt som inte passar dess typ. Du kan till exempel försöka anropa ett nummer som om det vore en funktion, eller läsa en egenskap från null.',
			"code" =>		'let num = 123;<br>num(); // Kan inte anropa ett tal<br>let f;<br>f(); // f är undefined, inte en funktion<br>let x = null;<br>console.log(x.name); // Kan inte läsa egenskap från null', 
			"type" =>		"info",
			"lang" =>		"javascript"
		],[
			"text" =>		'Ett <b>Range Error</b> betyder att ett värde ligger utanför vad som är tillåtet. Det kan t.ex. ske när du försöker skapa en array med ett negativt antal element, eller kör rekursion utan stopp så att anropsdjupet blir för stort.',
			"code" =>		'let arr = new Array(-5); // Negativ längd<br>function loop(){<br>  loop(); // Oändlig rekursion<br>}<br>loop();', 
			"type" =>		"info",
			"lang" =>		"javascript"
		],[
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
			"text" =>	"För att använda villkor effektivt så behövs if-satser. Det är en central kärna i all progarmmering. Om något, så händer något annat. I exemplet kontrolleras ett enkelt villkor, och ifall det stämmer så skrivs \"Sant\" ut i konsollen. ",
			"docs" =>	"https://www.w3schools.com/js/js_if_else.asp",
			"code" =>	'if(1 === 1) {<br>   console.log("Sant");<br>}',
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => "Vilket kodord används för att kontrollera ifall ett villkor stämmer för att i så fall utföra något?",
			"docs" => "https://www.w3schools.com/js/js_if.asp",
			"code" => '¤kodord¤',
			"type" => "text",
			"answer" => "if"
		],[
			"text" => "Skriv en fungerande if-sats.",
			"docs" => "https://www.w3schools.com/js/js_if_else.asp",
			"code" => '¤if-sats¤',
			"type" => "code",
			"answer" => [
				[
					"type" => "if"
				]
			]
		],[
			"text" =>	"När man funderar på villkor och att något ska hända ifall det villkoret stämmer, så kommer man ganska snabbt fram till ett dilemma. Om man vill att B ska hända ifall A stämmer, måste man kontrollera ifall A inte stämmer för att få C att hända? Nej! Det är där <b>else</b> kommer in! Helt enkelt, ifall A stämmer, gör B. Men om det inte stämmer, gör C.",
			"docs" =>	"https://www.w3schools.com/js/js_if_else.asp",
			"code" =>	'if(1 === 2) { // if med villkor<br>   console.log("Sant"); // Vad som händer om villkoret stämmer<br>} else { // Annars<br>   console.log("Falskt"); // Vad som händer ifall villkoret INTE stämmer<br>}',
			"type" =>	"info",
			"lang" =>	"javascript"
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
			"text" => "Vad heter kodordet som saknas?",
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
			"text" => "Skriv en kod som innehåller en if-sats och en kopplad else-sats. Villkor etc väljer du själv.",
			"docs" => "https://www.w3schools.com/js/js_if_else.asp",
			"code" => '¤Kod¤',
			"type" => "code",
			"answer" => [
				[
					"type" => "if",
					"else" => true
				]
			]
		],[
			"text" => "Skriv en kod som skapar variabeln <b>a</b> med värdet <b>\"1\"</b>. Skriv också en if-sats som kontrollerar ifall <b>a</b> har värdet <b>true</b> med rätt datatyp. Ifall villkoret stämmer, skriv ut \"hej\" i konsollen. Ifall det inte stämmer, skriv ut \"hejdå\".",
			"docs" => "https://www.w3schools.com/js/js_if_else.asp",
			"code" => '¤skapa variabel¤;<br>¤kontroll om variabeln är sant¤ {<br>  console.log("hej");<br>} ¤kod¤ {<br>   console.log("hejdå");<br>}',
			"type" => "code",
			"answer" => [
				[
					"type" =>	"variable",
					"name" =>	"a",
					"value" =>	"1"
				],[
					"type" => "if",
					"condition" => [
						"left" => ["name" => "a"],
						"op" => "===",
						"right" => ["value" => true]
					],
					"else" => true
				]
			]
		],[
			"text" =>	"När man programmerar finns det något som kallas <b>best practice</b> - det betyder bästa sättet att göra saker på.<br>I JavaScript är det extra viktigt vid villkor. Många värden kan räknas som <b>true</b> eller <b>false</b>, även om de inte egentligen är det. Därför behöver du kontrollera att värdet verkligen är det du menar, till exempel med <b>=== true</b>.",
			"docs" =>	"https://www.w3schools.com/js/js_booleans.asp",
			"code" =>	'let isAdmin = 1;<br>if(isAdmin) { // Osäkert villkor<br>   console.log("Admin inloggad"); // Skrivs ut<br>} else {<br>   console.log("Användare inloggad");<br>}<br>if(isAdmin === true) { // Säkert villkor<br>   console.log("Admin inloggad");<br>} else {<br>   console.log("Användare inloggad"); // Skrivs ut<br>}',
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => "Vilken if-sats är säkrast när man får data från en databas man själv inte utvecklat?",
			"docs" => "https://www.w3schools.com/js/js_if_else.asp",
			"code" => 'const a = fetchFromDB();<br>if(a) {<br>   console.log("Alternativ A");<br>}<br>if(a === true) {<br>   console.log("Alternativ B");<br>}',
			"type" => "alt",
			"alts" =>	["Första if-satsen", "Andra if-satsen"],
			"answer" => "Andra if-satsen"
		],[
			"text" =>	'Ibland kommer man till en situation när man bara ska tilldela värdet på en variabel beroende på ett villkor. Att då skriva en hel <b>if-else</b> känns lite omständigt. Särskilt ifall man behöver flera. Det är där shorthand-<b>if</b> kommer in!<br>Shorthand-<b>if</b> gör att vi kan tilldela ett värde, beroende på ett villkor, till en variabel, på en enda rad! Den är uppdelad i tre delar; villkor, värde om sant, och värde om falskt. Villkoret först, efter villkoret skriver man ett "?". Direkt efter det skriver man vilket värdet är ifall villkoret är sant, sen ett kolon (:), och till sist vilket värde om villkoret är falskt.',
			"docs" =>	"https://www.w3schools.com/js/js_if_ternary.asp",
			"code" =>	'const user = {<br>   username: "Peter",<br>   hash: "aee4bd941f8b4d9e39210c06c44fcb71",<br>   role: "admin"<br>};<br>console.log("Användaren är " + (user.role === "admin")?"administratör":"vanlig användare");',
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => 'Skriv en kod som skriver ut <b>"Myndig"</b> om användaren är 18 eller mer, eller <b>"Inte myndig"</b> ifall användaren inte är myndig.',
			"docs" => "https://www.w3schools.com/js/js_if_ternary.asp",
			"code" => 'const user = {<br>   name: "Kalle",<br>   age: 19<br>};<br>console.log(¤shorthand-if¤);',
			"type" => "code",
			"answer" => [
				[
					"type" => "expression",
					"expression" => [
						"args" => [
							[
								"left" =>	"user.age",
								"op" =>		">=",
								"right" =>	18,
								"true" =>	"Myndig",
								"false" =>	"Inte myndig"
							]
						]
					]
				]
			]
		],[
			"text" =>	'Då har vi koll på <b>if</b>, <b>else</b> och shorthand-<b>if</b>. I många situationer så behöver vi kontrollera mer än bara antingen eller, som det är med if-else. Och då finns såklart <b>else if</b>. Det är precis som det låter en kombination av if och else. En <b>else if</b> måste alltid komma efter en if, eller en annan <b>else if</b>.',
			"docs" =>	"https://www.w3schools.com/js/js_if_ternary.asp",
			"code" =>	'const a = 2;<br>if(a === 1) { // Stämmer inte<br>   console.log("a=1"); // Händer inte<br>} else if(a === 2) { // Stämmer<br>   console.log("a=2"); // Skrivs ut<br>} else { // Struntar i denna eftersom förra stämde<br>   console.log("a != 1 && a != 2"); // Händer inte<br>}',
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => 'Skriv en kod som kontrollerar ifall variabeln är något av två alternativ; "Admin" eller "User". Först "Admin", sen "User". Om variabeln är "Admin", skriv ut "Välkommen bossen". Annars om den är "User", skriv ut "Välkommen användare". Om den inte är något av det, skriv ut "Försök igen".',
			"docs" => "https://www.w3schools.com/js/js_if_ternary.asp",
			"code" => 'const user = "admin";<br>¤första kontrollen¤ {<br>  console.log("Välkommen bossen");<br>} ¤andra kontrollen¤ {<br>   console.log("Välkommen användare");<br>} ¤om ingen kontroll stämmer¤ {<br>   console.log("Försök igen");<br>}',
			"type" => "code",
			"answer" => [
				[
					"type" => "if",
					"condition" => [
						"left" =>	["name" => "user"],
						"op" =>		"===",
						"right" =>	["value" => "User"]
					],
					"else" =>	true
				],[
					"type" => "if",
					"condition" => [
						"left" =>	["name" => "user"],
						"op" =>		"===",
						"right" =>	["value" => "Admin"]
					],
					"else" =>	true
				]
			]
		]
	],
	"jsloop" =>	[
		[
			"text" =>	"<b>for</b> används när du vet hur många gånger något ska upprepas. Du startar med ett värde, sätter ett villkor, och ändrar värdet varje gång loopen körs.",
			"docs" =>	"https://www.w3schools.com/js/js_loop_for.asp",
			"code" =>	'for(let i = 0; i < 5; i++) { // Loopar 5 gånger<br>   console.log(i); // Skriver ut varje nummer. 0 till 4<br>}',
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => "Vilket kodord används för att skapa en loop med bestämt antal rundor?",
			"docs" => "https://www.w3schools.com/js/js_loop_for.asp",
			"code" => '¤kodord¤(let c = 0; c < 10; c++) { }',
			"type" => "keyword",
			"answer" => 'for'
		],[
			"text" =>	"I en <b>for</b>-loop så bestäms en räknare, ett villkor och hur räknaren ska förändras. Varje del separeras med semikolon (;).<br>Räknaren skapas så samma sätt som andra variabler, men alltid med let.<br>Villkoret fungerar på samma sätt som ett villkor i en if-sats. Men medan villkoret här stämmer, kommer loopen att fortsätta.<br>Förändringen är hur räknaren ska ändras efter varje runda.",
			"docs" =>	"https://www.w3schools.com/js/js_loop_for.asp",
			"code" =>	'//for(skapa räknare; villkor; ändra räknare) {<br>  for(let i = 0    ; i < 5  ; i++          ) {',
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => "Hur många gånger kommer loopen köras?",
			"docs" => "https://www.w3schools.com/js/js_loop_for.asp",
			"code" => 'for(let c = 0; c < 5; c++) {}',
			"type" => "input",
			"answer" => "5"
		],[
			"text" => "Vilket är det sista talet som kommer skrivas ut?",
			"docs" => "https://www.w3schools.com/js/js_loop_for.asp",
			"code" => 'for(let c = 0; c < 3; c++) {<br>   console.log(c);<br>}',
			"type" => "input",
			"answer" => "2"
		],[
			"text" => "Ändra loopen så att den körs 10 gånger.",
			"docs" => "https://www.w3schools.com/js/js_loop_for.asp",
			"code" => 'for(let c = 0; c <= ¤tal¤; c++) {<br>   console.log(c);<br>}',
			"type" => "code",
			"answer" => [
				[
					"type" => "for",
					"condition" => [
						"left" => ["name" => "c"],
						"op" => "<=",
						"right" => ["value" => 9]
					]
				]
			]
		],[
			"text" =>	"Det finns fler sätt att använda en <b>for</b>-loop. Den första vi börjar med är <b>for in</b>. Men vi skriver inte <b>for in</b>. Utan vi använder den för att gå igenom listor. Antingen <b>array</b> eller <b>objekt</b>. När vi använder <b>for in</b> så gör vi det särskilt för att ha tillgång till index när vi loopar. Används främst för att komma åt index i objekt, men används ibland även till arrays.",
			"docs" =>	"https://www.w3schools.com/js/js_loop_forin.asp",
			"code" =>	'const user = {<br>name: "Peter", age: 25, hometown: "Malmö"};<br>for(let i in user) {<br>   console.log(i+": "+user[i]);<br>}',
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => "Hur många gånger kommer loopen köras?",
			"docs" =>	"https://www.w3schools.com/js/js_loop_forin.asp",
			"code" => 'const list = {x: 1, y: 3, z: 4};<br>for(let i in list) {<br>   console.log(i+": "+list[i]);<br>}',
			"type" => "input",
			"answer" => "3"
		],[
			"text" => "Vilket är det sista som kommer skrivas ut?",
			"docs" =>	"https://www.w3schools.com/js/js_loop_forin.asp",
			"code" => 'const randomData = ["Access", 2, 3.5, True];<br>for(let row in randomData) {<br>   if(row < 2) {<br>      console.log(c);<br>   }<br>}',
			"type" => "input",
			"lang" => "JavaScript",
			"answer" => "2"
		],[
			"text" => "Skapa en for in-loop som går igen hela <b>list</b> och skriver ut index för varje rad.",
			"docs" =>	"https://www.w3schools.com/js/js_loop_forin.asp",
			"code" => 'const list = { a: "A", b: "B", c: "C"};<br>for(¤kod¤) {<br>   console.log(row);<br>}',
			"type" => "code",
			"answer" => [
				[
					"type" => "expression",
					"expression" => [
						"args" => ["row"]
					]
				],[
					"type" => "forin",
					"array" => "list"
				]
			]
		],[
			"text" =>	"<b>For-of</b> fungerar exakt likadant <b>for-in</b> med den enda skillnaden att <b>for-of</b> används för att loopa igenom värdena istället för index. Används till arrays för att göra något med varje värde.",
			"docs" =>	"https://www.w3schools.com/js/js_loop_forof.asp",
			"code" =>	'const users = ["Peter", "Emma", "Thor", "Jafar", "Chang"];<br>for(let user of users) {<br>   console.log(user);<br>}',
			"type" =>	"info",
			"lang" =>	"javascript"
		],[
			"text" => "Hur många tal summeras?",
			"docs" =>	"https://www.w3schools.com/js/js_loop_forof.asp",
			"code" => 'const ages = [19, 24, 38, 51, 27, 15, 77];<br>let sum = 0;<br>for(let age of ages) {<br>   sum += age;<br>}',
			"type" => "input",
			"answer" => "7"
		],[
			"text" => "Vilket är det sista som kommer skrivas ut?",
			"docs" =>	"https://www.w3schools.com/js/js_loop_forof.asp",
			"code" => 'const randomData = ["Access", 2, 3.5, true];<br>for(let data of randomData) {<br>   if(data >= 1) {<br>      console.log(data);<br>   }<br>}',
			"type" => "input",
			"lang" => "JavaScript",
			"answer" => "true"
		],[
			"text" => "Skapa en for of-loop som går igen hela <b>list</b> och skriver ut värdet för varje rad.",
			"docs" =>	"https://www.w3schools.com/js/js_loop_forof.asp",
			"code" => 'const list = ["A", "B", "C", "D"];<br>for(¤kod¤) {<br>   console.log(letter);<br>}',
			"type" => "code",
			"answer" => [
				[
					"type" => "expression",
					"expression" => [
						"args" => ["letter"]
					]
				],[
					"type" => "forof",
					"array" => "list"
				]
			]
		]
	],
	"jsfunc" => [
		[
			"text" =>	"Funktioner! ",
			"docs" =>	"https://www.w3schools.com/js/js_loop_forof.asp",
			"code" =>	'const users = ["Peter", "Emma", "Thor", "Jafar", "Chang"];<br>for(let user of users) {<br>   console.log(user);<br>}',
			"type" =>	"info",
			"lang" =>	"javascript"
		]
	],
	"html1" =>	[
		[
			"text" => "Skapa ett div-element med en paragraf i.",
			"docs" => "https://www.w3schools.com/html/default.asp",
			"code" => '¤kod¤',
			"code" => '¤<div>
   <p>Test</p>
</div>¤',
// 			"code" => '<¤div¤>
//    <¤p¤>En text</¤p¤>
// </¤div¤>',
			"type" => "tree",
			"answer" => [
				[
					"type" => "div",
					"attributes" => [
						"id" => "test"
					],
					"children" => [
						[
							"type" =>	"p"
						]
					]
				]
			]
		]
	]
];

$levelGroups = [
	"git" =>	"Git",
	"js" =>		"JS variabler",
	"js2" =>	"JS villkor",
	"js3" =>	"JS villkor forts.",
	"jsts" =>	"JS Fel",
	"js4" =>	"JS if",
	"jsloop" =>	"JS Loopar",
	"jsfunc" =>	"JS Funktioner"
	// "html1" =>	"HTML intro",
];
?>