function _________msg(type, msg) {
	parent.postMessage({
		qType: (levelType !== undefined)?levelType:false,
		origin: "trainjs",
		type: type,
		msg: msg
	}, '*');
}
const _________trueLog = console.log;
let consoleRan = false;
console.log = function(msg) {
	consoleRan = true;
	document.querySelector("code").innerText = "LOG: "+msg;
	_________msg("log", msg);
}
_________TRAINJS_RESULT = function(answers) {
	_________msg("var", answers);
}
_________TRAINJS_RESULT_T = function(answers) {
	_________msg("text", answers);
}
_________TRAINJS_RESULT_LOGCHECK = function() {
	if(consoleRan === false) {
		_________msg("error", JSON.stringify({
			error: "Använde du rätt funktion?",
			code: "Även om koden egentligen kan köras, så använde du fel funktion för att skriva ut något i konsollen."
		}));
	}
}