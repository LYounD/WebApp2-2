/* CSE326 : Web Application Development
 * Lab 10 - Maze Assignment
 * 
 */

var loser = null;  // whether the user has hit a wall

window.onload = function() {
	var block = $$(".boundary")
    for (var i = 0 ; i <= block.length -1 ; i++){
        block[i].onmouseover = overBoundary;
        block[i].onmouseout = overBoundary;
    }
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
	var boundaries = $$(".boundary");
    for (var i = 0; i< boundaries.length;i++){
        if (boundaries[i].hasClassName("youlose")){
            boundaries[i].removeClassName("youlose");
        } else {
            boundaries[i].addClassName("youlose");
        }
    }
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {

}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {

}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {

}

