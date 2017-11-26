window.onload = function () {
	var pimpin_button = document.getElementById("pimpin");
	pimpin_button.onclick = timer;
	var bling_button = document.getElementById("Bling");
	bling_button.onclick = bling;
	var izzle_button = document.getElementById("izzle");
	izzle_button.onclick = izzle;
	var igpay_button = document.getElementById("igpay");
	igpay_button.onclick = igpay;
	var malkovitch_button = document.getElementById("malkovitch");
	malkovitch_button.onclick = malkovitch;
};

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
		text_area.style.textDecoration = 'underline';
		text_area.style.color = 'green';
		document.body.style.backgroundImage = "url('http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/8/hundred.jpg')";
	} else if (checkbox.checked === false) {
		text_area.style.fontWeight = 'normal';
		text_area.style.textDecoration = 'none';
		text_area.style.color = 'black';
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
		if (texts[i][0] == 'a' || texts[i][0] == 'e' || texts[i][0] == 'i' || texts[i][0] == 'o' || texts[i][0] == 'u' || texts[i][0] == 'A' || texts[i][0] == 'E' || texts[i][0] == 'I' || texts[i][0] == 'O' || texts[i][0] == 'U') {
			var word = texts[i] + "ay";
			texts[i] = word;
		} else {
			for (var j = 1 ; texts[i].length - 1; j++) {
				if (texts[i][0] == 'a' || texts[i][0] == 'e' || texts[i][0] == 'i' || texts[i][0] == 'o' || texts[i][0] == 'u' || texts[i][0] == 'A' || texts[i][0] == 'E' || texts[i][0] == 'I' || texts[i][0] == 'O' || texts[i][0] == 'U'){
					var head = texts[i].substring(0, j);
					var tail = texts[i].substring(j, texts[i].length - j + 1);
					var word = tail + head + "ay";
					texts[i] = word;
					break;
				} else if (j == texts[i].length - 1){
					texts[i] = texts[i] + "ay";
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
			//실습 부분에 malkovich라고 되있어서 malkovich 라고 적었습니다. malkovtich인듯하지만...
		}
	}

	texts = texts.join(" ");
	text_area.value = texts;
}