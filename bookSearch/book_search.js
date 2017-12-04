window.onload = function() {
    $("b_xml").onclick=function(){
    	    //construct a Prototype Ajax.request object
    	new Ajax.Request("books.php", {
    		method : "get",
    		parameters : {category : getCheckedRadio($$("#category input"))},
    		onSuccess : showBooks_XML,
    		onFailure : ajaxFailed,
    		onException : ajaxFailed
    	});
    }
    $("b_json").onclick=function(){
    	    //construct a Prototype Ajax.request object
    	new Ajax.Request("books_json.php", {
    		method : "get",
    		parameters : {category : getCheckedRadio($$("#category input"))},
    		onSuccess : showBooks_JSON,
    		onFailure : ajaxFailed,
    		onException : ajaxFailed
    	})
    }
};

function getCheckedRadio(radio_button){
	for (var i = 0; i < radio_button.length; i++) {
		if(radio_button[i].checked){
			return radio_button[i].value;
		}
	}
	return undefined;
}

function showBooks_XML(ajax) {
	//alert(ajax.responseText);
	var books = ajax.responseXML.getElementsByTagName("book");
	var category_len = books.length;
	while ($("books").firstChild){
		$("books").removeChild($("books").firstChild);
	}
	for (var i = 0 ; i < category_len; i++) {
		var title = books[i].getElementsByTagName("title")[0].firstChild.nodeValue;
		var author = books[i].getElementsByTagName("author")[0].firstChild.nodeValue;
		var year = books[i].getElementsByTagName("year")[0].firstChild.nodeValue;
		var li = document.createElement("li");
		li.innerHTML = title + ", by " + author + "(" + year +")";
		document.getElementById("books").appendChild(li);
	}
}

function showBooks_JSON(ajax) {
	alert(ajax.responseText);
}

function ajaxFailed(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText + 
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}
