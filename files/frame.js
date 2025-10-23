function _________msg(type, msg) {
	parent.postMessage({
		origin: "trainjs",
		type: type,
		msg: msg
	}, '*');
}
const _________trueLog = console.log;
console.log = function(msg) {
	document.querySelector("code").innerText = msg;
	_________msg("log", msg);
}
_________TRAINJS_RESULT = function(answers) {
	_________msg("var", answers);
}
_________TRAINJS_RESULT_T = function(answers) {
	_________msg("text", answers);
}