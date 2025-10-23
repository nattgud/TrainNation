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
			for(let i = 0; i <ca.length; i++) {
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
	function correct(v, m) {
		popup(m, !v);
		if(v === true) {
			level++;
			cookies.set("train_level_"+trainType, level, 1);
			setTimeout(loadLevel, 500);
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
				if(data === null) {
					//document.querySelector("#levelTitle").innerText = "";
					document.querySelector("main > section:first-of-type").innerHTML = "<h1>Klar!</h1><p>Det var allt som fanns här, än så länge. Men det kan mycket möjligtvis dyka upp mer snart!</p>";
					popup("Bra jobbat!", false);
					document.querySelector("main > section:last-of-type").style.display = "none";
					// document.querySelector("iframe").style.display = "none";
					return false;
				}
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
							console.log(els);
							if(!els[data.progress[0]].classList.contains("current")) {
								els[data.progress[0]].classList.add("current");
							}
						}, 1);
					}
					document.querySelector("#progress #line").style.width = ((data.progress[0])*(96/(data.progress[1]-1)))+"%";
				}
				let inp = true;
				let cmd = "";
				if(["text", "alt"].indexOf(data.type) !== -1) {
					document.querySelector("#runButton").innerText = "Svara";
				} else {
					document.querySelector("#runButton").innerText = "Kör kod";
				}
				if(data.type !== "alt") {
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
				} else {
					document.querySelector("#alts").style.display = "block";
					document.querySelector("#alts").innerHTML = "";
					cmd = data.code;
					for(let alt of data.alts) {
						const tmp = document.createElement("input-check");
						tmp.innerText = alt;
						tmp.name = "qAlts";
						document.querySelector("#alts").appendChild(tmp);
					}
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
					}
					// console.log(els);
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
				if(["text", "alt"].indexOf(data.type) !== -1) {
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
				}
				if(["text", "alt"].indexOf(data.type) !== -1) {
					console.log(code);
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
	document.querySelector("#runButton").addEventListener("click", runCode);
	document.querySelector("#resetLevel").addEventListener("click", function() {
		const ok = confirm("Vill du nollställa nivåerna? Du kan inte ångra detta!");
		if(ok === true) {
			popup("Nollställer nivåerna.");
			level = 0;
			cookies.set("train_level_"+trainType, level, 1);
			loadLevel();
		}
	});
	document.querySelector("#backLevel").addEventListener("click", function() {
		const ok = confirm("Vill du gå tillbaka en nivå? Du kan inte ångra detta!");
		if(ok === true) {
			popup("Backar en nivå.");
			level--;
			cookies.set("train_level_"+trainType, level, 1);
			loadLevel();
		}
	});
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
					// console.log(msg);
					// iframe.src = "files/frame.php?t=error&c="+encodeURIComponent(code)+"&e="+encodeURIComponent(msg);
				}
				// console.table(e.data);
			}
		}
	};
	window.addEventListener('message', listener);
	if(cookies.get("train_level_"+trainType) !== false) {
		level = Number(cookies.get("train_level_"+trainType));
	} else {
		cookies.set("train_level_"+trainType, 0, 1);
	}
	document.querySelector("iframe").addEventListener("error", () => console.log("Iframe kunde inte laddas"));
	// document.querySelector("iframe").addEventListener("load", function() {
	// 	// console.log(answerList);
	// 	//document.querySelector("#runButton").disabled = false;
	// 	answerList = [];
	// });
	loadLevel();
});