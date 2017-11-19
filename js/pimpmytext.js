function bigger_pimpin(){
	var text_area = document.getElementById('t_area');
	if (text_area.style.fontSize === ""){
		var pt = 14;
	} else {
		var pt = parseInt(text_area.style.fontSize) + 2;
	}
	text_area.style.fontSize = pt + "pt";
}

function timer() {
	setInterval("bigger_pimpin()", 500);
}

function bling(){
	var text_area = document.getElementById('t_area');
	var checkbox = document.getElementById('Bling')
	if (checkbox.checked === true) {
		text_area.style.fontWeight = 'bold';
		document.body.style.backgroundImage = "url('http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/8/hundred.jpg')";
	} else if (checkbox.checked === false) {
		text_area.style.fontWeight = 'normal';
		document.body.style.backgroundImage = null;
	}

}

function izzle() {
	var text_area = document.getElementById('t_area');
	text_area.value = text_area.value.toUpperCase();
	var sp = text_area.value.split(".");
	text_area.value = sp.join("-izzle.");
	
}

function igpay() {
	var text_area = document.getElementById('t_area');
	var texts = text_area.value.split(" ");
	for (var i = 0; i < texts.length ; i++) {
		if (texts[i][0] == 'a' || texts[i][0] == 'e' || texts[i][0] == 'i' || texts[i][0] == 'o' || texts[i][0] == 'u') {
		} else {
			var num = 1;
			for (var j = 1 ; texts[i].length - 1; j++) {
				if (texts[i][j] == 'a'){
					var head = texts[i].substring(0, j+1);
					var tail = texts[i].substring(j, texts[i].length - j);
					var word = tail + head + "ay";
					texts[i] = word;
					break;
				} else if (texts[i][j] == 'e'){
					var head = texts[i].substring(0, j+1);
					var tail = texts[i].substring(j, texts[i].length - j);
					var word = tail + head + "ay";
					texts[i] = word;
					break;
				} else if (texts[i][j] == 'i'){
					var head = texts[i].substring(0, j+1);
					var tail = texts[i].substring(j, texts[i].length - j);
					var word = tail + head + "ay";
					texts[i] = word;
					break;
				} else if (texts[i][j] == 'o'){
					var head = texts[i].substring(0, j+1);
					var tail = texts[i].substring(j, texts[i].length - j);
					var word = tail + head + "ay";
					texts[i] = word;
					break;
				} else if (texts[i][j] == 'u'){
					var head = texts[i].substring(0, j+1);
					var tail = texts[i].substring(j, texts[i].length - j);
					var word = tail + head + "ay";
					texts[i] = word;
					break;
				} 
			}
		}
	}

	texts = texts.join(" ");
	text_area.value = texts;
}

function malkovitch() {
	var text_area = document.getElementById('t_area');
	var texts = text_area.value.split(" ");

	for (var i = 0; i < texts.length ; i++) {
		if(texts[i].length >= 5){
			texts[i] = "malkovich";
		}
	}

	texts = texts.join(" ");
	text_area.value = texts;
}