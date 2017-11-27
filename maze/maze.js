/* CSE326 : Web Application Development
 * Lab 10 - Maze Assignment
 * 
 */
"use strict";

var loser = null;  // whether the user has hit a wall

window.onload = function() {
	var block = $$("div#maze div.boundary");
	var cheatcheck = document.getElementById("maze");
    for (var i = 0 ; i <= block.length -1 ; i++){
        block[i].onmouseover = overBoundary;
    }
    $("end").observe("mouseover", overEnd);
    $("start").observe("click", startClick);
    
    cheatcheck.onmouseleave = overBody;
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
	var boundaries = $$("div#maze div.boundary");
    for (var i = 0 ; i< boundaries.length && loser === null ; i++){
        boundaries[i].addClassName("youlose");
    }
    if (loser === null){
    	document.getElementById("status").innerHTML = "You Lose! :(";
    }
    loser = 1;
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
	var boundaries = $$("div#maze div.boundary");

	for(var i = 0 ; i < boundaries.length ; i++){
		boundaries[i].removeClassName("youlose");
	}
	loser = null;
	document.getElementById("status").innerHTML = "You are playing maze!";
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
	if (loser === null){
		document.getElementById("status").innerHTML = "You Win! :)";
	}
	loser = 2;
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
	var boundaries = $$("div#maze div.boundary");
    for (var i = 0 ; i< boundaries.length && loser === null ; i++){
        boundaries[i].addClassName("youlose");
    }
    if (loser === null){
    	document.getElementById("status").innerHTML = "You Lose! :(";
    }
    loser = 1;
}

