var answerList = [];
var popupTimer = null;
function popup(txt = "", warn = null) {
	document.querySelector("#msg").classList.remove("ok");
	document.querySelector("#msg").classList.remove("warning");
	document.querySelector("#msg").innerText = txt;
	if(warn === false) {
		document.querySelector("#msg").classList.add("ok");
	} else if(warn === true) {
		document.querySelector("#msg").classList.add("warning");
	}
	clearTimeout(popupTimer);
	popupTimer = setTimeout(function() {
		document.querySelector("#msg").innerText = "";
	}, 2000+(txt.length*25));
}
window.addEventListener("load", () => {
	if(document.querySelector("#runButton") === null) {
		return false;
	};
	let theClass = class check extends HTMLElement {
		set disabled(v) {
			if(v) {
				this.setAttribute("disabled", "");
			} else {
				this.removeAttribute("disabled");
			}
		}
		get disabled() {
			return this.hasAttribute("disabled");
		}
		set checked(v) {
			if(v) {
				this.setAttribute("checked", "");
			} else {
				this.removeAttribute("checked");
			}
		}
		get checked() {
			return this.hasAttribute("checked");
		}
		set name(v) {
			if(v) {
				this.setAttribute("name", v);
			} else {
				this.removeAttribute("name");
			}
		}
		get name() {
			return this.getAttribute("name");
		}
		set multi(v) {
			if(v) {
				this.setAttribute("multi", "");
			} else {
				this.removeAttribute("multi");
			}
		}
		get multi() {
			return this.hasAttribute("multi");
		}
		get value() {
			const els = document.querySelectorAll("input-check[name="+this.name+"]");
			let val = false;
			if(this.multi === true) {
				val = [];
			}
			for(let el of els) {
				if(el.checked === true) {
					if(this.multi === true) {
						val.push(el.innerText);
					} else {
						val = el.innerText;
						break;
					}
				}
			}
			return val;
		}
		constructor() {
			super();
			const event = document.createEvent('Event');
			event.initEvent('change', true, true);
			let title = this.innerText;
			this.addEventListener("click", () => {
				if(this.disabled !== true) {
					if(this.multi !== true) {
						const els = document.querySelectorAll("input-check[name="+this.name+"]");
						for(let el of els) {
							el.checked = false;
						}
					}
					if(this.checked === false) {
						this.checked = true;
					} else {
						this.checked = false;
					}
					if ("createEvent" in document) {
						this.dispatchEvent(event);
					}
					else {
						this.fireEvent("onchange");
					}
				}
			});
		}
	};
	var inputCheck = window.customElements.define("input-check", theClass);

	let level = 0;
	async function ajax(url) {
		const res = await fetch(url);
		if (!res.ok) throw new Error('HTTP error: ' + res.status);
		return await res.text();
	}
	const cookies = {
		set: function(cname, cvalue, exdays) {
			const d = new Date();
			d.setTime(d.getTime() + (exdays*24*60*60*1000));
			let expires = "expires="+ d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		},
		get: function(cname) {
			let name = cname + "=";
			let decodedCookie = decodeURIComponent(document.cookie);
			let ca = decodedCookie.split(';');
			for(let i = 0; i < ca.length; i++) {
				let c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return false;
		}
	}
	let caret = {
		getPos: function(el) {
			const sel = window.getSelection();
			if (!sel.rangeCount) return 0;

			const range = sel.getRangeAt(0);
			const preRange = range.cloneRange();

			preRange.selectNodeContents(el);
			preRange.setEnd(range.endContainer, range.endOffset);

			return preRange.toString().length;
		}, setPos: function(el, i) {
			const range = document.createRange();
			const sel = window.getSelection();

			let nodeStack = [el], node, found = false, charsLeft = i;

			while (!found && (node = nodeStack.pop())) {
				if (node.nodeType === 3) {
				if (node.length >= charsLeft) {
					range.setStart(node, charsLeft);
					range.collapse(true);
					found = true;
				} else {
					charsLeft -= node.length;
				}
				} else {
					let children = Array.from(node.childNodes);
					for (let i = children.length - 1; i >= 0; i--) nodeStack.push(children[i]);
				}
			}

			if (found) {
				sel.removeAllRanges();
				sel.addRange(range);
			}
		}
	}
	if(cookies.get("train_level_"+trainType) !== false) {
		level = Number(cookies.get("train_level_"+trainType));
		if(level < 0) {
			level = 0;
		}
	} else {
		cookies.set("train_level_"+trainType, 0, 31);
	}
	function correct(v, m) {
		popup(m, !v);
		if(v === true) {
			level++;
			cookies.set("train_level_"+trainType, level, 31);
			setTimeout(loadLevel, 2000);
			// loadLevel();
		} else {
			document.querySelector("#runButton").disabled = false;
		}
	}

	function loadLevel() {
		document.querySelector("#levelTitle").innerText = " - Level ?";
		ajax('files/levels.php?type=gen&level='+level)
			.then(data => {
				data = JSON.parse(data);
				document.querySelector("#loadingWindow").style.display = "none";
				if(data.progress !== undefined) {
					const els = document.querySelectorAll("#progress > div:not(#line)");
					if(els.length === 0) {
						for(let c = 0; c < data.progress[1]; c++) {
							const tmp = document.createElement("DIV");
							tmp.classList.add("milestone");
							if(c < data.progress[0]) {
								tmp.classList.add("done");
							}
							if(c === data.progress[0]) {
								tmp.classList.add("current");
							}
							document.querySelector("#progress").appendChild(tmp);
						}
					} else {
						for(let c = 0; c < data.progress[1]; c++) {
							if(els[c].classList.contains("current")) {
								els[c].classList.remove("current");
							}
						}
						for(let c = 0; c < data.progress[1]; c++) {
							if(c < data.progress[0]) {
								if(!els[c].classList.contains("done")) {
									els[c].classList.add("done");
								}
							} else {
								if(els[c].classList.contains("done")) {
									els[c].classList.remove("done");
								}
							}
						}
						setTimeout(function() {
							if(els.length > data.progress[0]) {
								if(!els[data.progress[0]].classList.contains("current")) {
									els[data.progress[0]].classList.add("current");
								}
							}
						}, 1);
					}
					let p = ((data.progress[0])*(96/(data.progress[1]-1)));
					document.querySelector("#progress #line").style.width = ((p >= 96)?96:p)+"%";
				}
				if(data.q === undefined) {
					document.querySelector("#doneWindow").style.display = "block";
					document.querySelector("#trainWindow").style.display = "none";
					//document.querySelector("#levelTitle").innerText = "";
					// document.querySelector("main > section:first-of-type > div:first-of-type").innerHTML = "<h1>Klar!</h1><p>Det var allt som fanns här, än så länge. Men det kan mycket möjligtvis dyka upp mer snart!</p>";
					popup("Bra jobbat!", false);
					document.querySelector("main > section:last-of-type").style.display = "none";
					// document.querySelector("iframe").style.display = "none";
					if(document.querySelector("#menuItem"+trainType) !== null) {
						if(document.querySelector("#menuItem"+trainType+" > .material-symbols-outlined") === null) {
							let tmp = document.createElement("SPAN");
							tmp.innerText = "done";
							tmp.classList.add("material-symbols-outlined");
							document.querySelector("#menuItem"+trainType).innerText = document.querySelector("#menuItem"+trainType).innerText.trim()+" ";
							document.querySelector("#menuItem"+trainType).appendChild(tmp);
						}
					}
					return false;
				} else {
					if(document.querySelector("#menuItem"+trainType) !== null) {
						if(document.querySelector("#menuItem"+trainType+" > .material-symbols-outlined") !== null) {
							let tmp = document.querySelector("#menuItem"+trainType+" > .material-symbols-outlined");
							tmp.parentNode.removeChild(tmp);
							document.querySelector("#menuItem"+trainType).innerText = document.querySelector("#menuItem"+trainType).innerText.trim();
						}
					}
					document.querySelector("#doneWindow").style.display = "none";
					document.querySelector("#trainWindow").style.display = "block";
				}
				let inp = true;
				let cmd = "";
				if(["text", "alt", "input"].indexOf(data.type) !== -1) {
					document.querySelector("#runButton").innerText = "Svara";
				} else {
					document.querySelector("#runButton").innerText = "Kör kod";
				}
				document.querySelector("#alts").innerHTML = "";
				if(["alt", "input"].indexOf(data.type) === -1) {
					document.querySelector("#alts").style.display = "none";
					for(let x of data.code) {
						if(x === "¤") {
							if(inp === true) {
								cmd += "<span contenteditable=true data-first=1>";
							} else {
								cmd += "</span>";
							}
							inp = !inp;
						} else {
							cmd += x;
						}
					}
				} else if(data.type === "alt") {
					document.querySelector("#alts").style.display = "block";
					cmd = data.code;
					for(let alt of data.alts) {
						const tmp = document.createElement("input-check");
						tmp.innerText = alt;
						tmp.name = "qAlts";
						document.querySelector("#alts").appendChild(tmp);
					}
				} else if(data.type === "input") {
					document.querySelector("#alts").style.display = "block";
					cmd = data.code;
					const tmp = document.createElement("input");
					tmp.type = "text";
					tmp.placeholder = "Svar";
					tmp.name = "qAnswer";
					document.querySelector("#alts").appendChild(tmp);
				}
				document.querySelector("#question").innerHTML = data.q;
				document.querySelector("code").innerHTML = cmd;
				document.querySelector("#runButton").disabled = false;
				setTimeout(function() {
					const els = document.querySelectorAll("span[contenteditable]");
					for(let x of els) {
						x.addEventListener("pointerdown", function(e) {
							if(x.dataset.first == 1) {
								x.removeAttribute("data-first");
								x.innerText = "";
								x.focus();
								e.preventDefault();
								return false;
							}
						});
						x.addEventListener("focus", function(e) {
							if(x.dataset.first == 1) {
								x.removeAttribute("data-first");
								x.innerText = "";
							}
						});
						x.addEventListener("input", function(e) {
							if(x.innerText.indexOf("\n") !== -1) {
								let pos = x.innerText.indexOf("\n");
								x.innerText = x.innerText.replace(/\n/g, "");
								caret.setPos(x, pos);
							}
						});
					}
				}, 1);
				document.querySelector("#levelTitle").innerText = " - Level "+(level+1);
				const iframe = document.querySelector('main > section:nth-of-type(2) > iframe');
				const docs = {
					git:	"https://www.w3schools.com/git/default.asp",
					js:		"https://www.w3schools.com/js/default.asp"
				};
				document.querySelector("#docs").href = docs[trainType];
				if(data.docs !== undefined) {
					if(data.docs !== "") {
						document.querySelector("#docs").href = data.docs;
					}
				}
				document.querySelector("#docs").style.display = "inline";
				if(["text", "alt", "input"].indexOf(data.type) !== -1) {
					iframe.parentNode.style.display = "none";
					iframe.style.display = "none";
				} else {
					iframe.parentNode.style.display = "block";
					iframe.style.display = "block";
					iframe.src = "files/frame.php?t=blank";
				}
			})
			.catch(err => {
				console.error(err);
			});
	}
	function runCode() {
		ajax('files/levels.php?type=typecheck&level='+level)
			.then(data => {
				data = JSON.parse(data);
				let code = document.querySelector("main > section:nth-of-type(1) code").innerText;
				if(data.type === "alt") {
					code = document.querySelector("input-check[name=qAlts]").value;
				} else if(data.type === "input") {
					code = document.querySelector("input[name=qAnswer]").value;
				}
				if(["text", "alt", "input"].indexOf(data.type) !== -1) {
					ajax('files/levels.php?type=answer&level='+level+'&answer='+JSON.stringify(code))
						.then(data => {
							data = JSON.parse(data);
							if(data.status === true) {
								correct(true, data.msg);
							} else {
								correct(false, data.msg);
							}
						})
						.catch(err => {
							console.error(err);
						});
				} else {
					const iframe = document.querySelector('main > section:nth-of-type(2) > iframe');
					iframe.src = "files/frame.php?l="+level+"&c="+encodeURIComponent(code);
				}
			})
			.catch(err => {
				console.error(err);
			});
	}
	if(document.querySelector("#runButton") !== null) {
		document.querySelector("#runButton").addEventListener("click", runCode);
	}
	if(document.querySelector("#resetLevel") !== null) {
		document.querySelector("#resetLevel").addEventListener("click", function() {
			const ok = confirm("Vill du nollställa nivåerna? Du kan inte ångra detta!");
			if(ok === true) {
				popup("Nollställer nivåerna.");
				level = 0;
				cookies.set("train_level_"+trainType, level, 31);
				loadLevel();
			}
		});
	}
	if(document.querySelector("#backLevel") !== null) {
		document.querySelector("#backLevel").addEventListener("click", function() {
			const ok = confirm("Vill du gå tillbaka en nivå? Du kan inte ångra detta!");
			if(ok === true) {
				popup("Backar en nivå.");
				level--;
				if(level < 0) {
					level = 0;
				}
				cookies.set("train_level_"+trainType, level, 31);
				loadLevel();
			}
		});
	}
	const listener = e => {
		if(e.data.origin !== undefined) {
			if(e.data.origin === "trainjs") {
				if(["log", "var", "vartype"].indexOf(e.data.type) !== -1) {
					document.querySelector("#runButton").disabled = true;
					let guess = e.data.msg;
					ajax('files/levels.php?type=answer&level='+level+'&answer='+JSON.stringify(guess))
						.then(data => {
							data = JSON.parse(data);
							if(data.status === true) {
								correct(true, data.msg);
							} else {
								correct(false, data.msg);
							}
						})
						.catch(err => {
							console.error(err);
						});
				} else if(e.data.type === "text") {
					document.querySelector("#runButton").disabled = true;
					let guess = e.data.msg;
					ajax('files/levels.php?type=answer&level='+level+'&answer='+JSON.stringify(guess))
						.then(data => {
							data = JSON.parse(data);
							if(data.status === true) {
								correct(true, data.msg);
							} else {
								correct(false, data.msg);
							}
						})
						.catch(err => {
							console.error(err);
						});
				}  else if(e.data.type === "msg") {
					console.log("__ MESSAGE __");
					console.log(e.data.msg);
					console.log("-------------")
				} else if(e.data.type === "error") {
					const code = document.querySelector("main > section:nth-of-type(1) code").innerText;
					const iframe = document.querySelector('main > section:nth-of-type(2) > iframe');
					const msg = (e.data.msg);
					iframe.src = "files/frame.php?t=error&c="+encodeURIComponent(code)+"&e="+encodeURIComponent(msg);
				}
				// console.table(e.data);
			}
		}
	};
	window.addEventListener('message', listener);
	loadLevel();
});
window.addEventListener("load", function() {
	const truthtable = document.querySelector("#truthtable");
	if(truthtable !== undefined) {
		/**
		* Kör användarkod isolerat i en Web Worker.
		* Koden kan använda console.log men har ingen DOM eller nätverksåtkomst.
		* @param {string} userCode - JavaScript-kod från användaren
		* @param {(type: 'log'|'error'|'done', data: any) => void} callback - Hantera resultat och fel
		*/
		// Skapa worker från en Blob
		const blob = new Blob([`
		self.fetch = () => { throw new Error('fetch disabled'); };
		self.XMLHttpRequest = class { constructor(){ throw new Error('XHR disabled'); } };
		self.WebSocket = class { constructor(){ throw new Error('WebSocket disabled'); } };
		self.importScripts = () => { throw new Error('importScripts disabled'); };

		self.onmessage = (e) => {
		try {
		const result = new Function('"use strict"; return (' + e.data[0] + ')')();
		self.postMessage({id: e.data[1], type:'result', data: result, vtype: (typeof result)});
		} catch(err) {
		self.postMessage({id: e.data[1], type:'error', message: String(err)});
		}
		};
		`], { type: 'application/javascript' });

		const worker = new Worker(URL.createObjectURL(blob));
		let functions = [];
		worker.onmessage = (ev) => {
			if(ev.data.type === 'result') functions[ev.data.id](ev.data);
			if(ev.data.type === 'error') functions[ev.data.id]({type: 'error', data: ev.data.message});
			functions[ev.data.id] = null;
		};
		let killTimer = null;
		function runIsolated(userCode, callback) {
			const id = functions.length;
			functions.push(callback);
			worker.postMessage([userCode, id]);
			clearTimeout(killTimer);
			killTimer = setTimeout(() => worker.terminate(), 5000);
		}

		truthtable.innerHTML = "";
		const typeColors = {
			"string":		"#500",
			"number":		"#060",
			"boolean":		"#055",
			"object":		"#550",
			"undefined":	"#505"
		};
		const bgColors = {
			"string":		"#300",
			"number":		"#040",
			"boolean":		"#033",
			"object":		"#330",
			"undefined":	"#303"
		};
		const opColors = {
			"+":	"#444",
			"-":	"#040",
			"*":	"#040",
			"/":	"#040",
			"==":	"#044",
			"===":	"#044",
			"!=":	"#044",
			"!==":	"#044",
			"&&":	"#040",
			"||":	"#400",
		};
		const vals = ['"abc"', '0', '1', 'true', 'false', 'null', 'undefined', '"0"', '"1"', '"true"', '"false"', '["abc"]', '[0]', '[1]', '[true]', '[false]'];
		const ops = ["+", "-", "*", "/", "==", "===", "!=", "!=="];
		// console.log(vals.length*ops.length*vals.length);
		for(const v1 of vals) {
			for(const o of ops) {
				for(const v2 of vals) {
					const cmd = v1+" "+o+" "+v2;
					const card = this.document.createElement("DIV");
					const spans = [
						this.document.createElement("SPAN"),
						this.document.createElement("SPAN"),
						this.document.createElement("SPAN"),
						this.document.createElement("SPAN"),
						this.document.createElement("SPAN")
					];
					spans[0].innerText = v1;
					spans[1].innerText = o;
					spans[2].innerText = v2;
					spans[3].innerText = "=";
					spans[4].innerText = "?"
					spans[0].style.backgroundColor = typeColors[typeof eval(v1)];
					spans[1].style.backgroundColor = opColors[o];
					spans[2].style.backgroundColor = typeColors[typeof eval(v2)];
					spans[3].style.backgroundColor = "#222";
					runIsolated(cmd, function(data) {
						if(data.type === "error") {
							card.style.backgroundColor = "#000";
							return false;
						}
						if(data.vtype === "boolean") {
							spans[4].style.backgroundColor = (data.data === true)?"#067":"#076";
						}
						// console.log(data.data+": "+data.vtype)
						spans[4].innerText = data.data;
						card.style.backgroundColor = bgColors[data.vtype];
					});
					card.appendChild(spans[0]);
					card.appendChild(spans[1]);
					card.appendChild(spans[2]);
					card.appendChild(spans[3]);
					card.appendChild(spans[4]);
					truthtable.appendChild(card);
				}
			}
		}
	} else {
		console.log("not exist");
	}
});