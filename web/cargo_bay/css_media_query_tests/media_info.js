
var idPrefix = "comment-";

var lastWidth = 0;
var lastHeight = 0;
var lastDevWidth = 0;
var lastDevHeight = 0;

// Append a comment after the element with the given id
function appendComment( id, comment ){
	var element = document.getElementById( id );
	if( element ){
		// Create paragraph with comment
		var commentPara = document.createElement('p');
		commentPara.setAttribute( 'id', idPrefix+id );
		commentPara.appendChild( document.createTextNode( comment ) );
		
		// Insert after element
		element.parentNode.insertBefore( commentPara, element.nextSibling );
		
	}
	// else: No element found. Do nothing. 
}

function replaceComment( unprefixedId, newComment ){
	var element = document.getElementById( idPrefix+unprefixedId );
	if( element ){
		// Replace text
		element.replaceChild( document.createTextNode( newComment ), element.childNodes[0] );
	}
}


function initComments(){			
	// Width
	lastWidth = document.documentElement.clientWidth;
	appendComment('width','Javascript says that width is: '+lastWidth+'px.');
	// Height
	lastHeight = document.documentElement.clientHeight;
	appendComment('height','Javascript says that height is: '+lastHeight+'px.');
	// Device Width
	lastDevWidth = screen.width;
	appendComment('dev-width','Javascript says that device width is: '+lastDevWidth+'px.');
	// Device Height
	lastDevHeight = screen.height;
	appendComment('dev-height','Javascript says that device height is: '+lastDevHeight+'px.');			
}
		
function updateComments(){
	// Width
	if( lastWidth != document.documentElement.clientWidth ){
		lastWidth = document.documentElement.clientWidth;
		replaceComment('width','Javascript says that width is: '+lastWidth+'px.');
	}
	// Height
	if( lastHeight != document.documentElement.clientHeight ){
		lastHeight = document.documentElement.clientHeight;
		replaceComment('height','Javascript says that height is: '+lastHeight+'px.');
	}
	// Device Width
	if( lastDevWidth != screen.width ){
		lastDevWidth = screen.width;
		replaceComment('dev-width','Javascript says that device width is: '+lastDevWidth+'px.');
	}
	// Device Height
	if( lastDevHeight != screen.height ){
		lastDevHeight = screen.height;
		replaceComment('dev-height','Javascript says that device height is: '+lastDevHeight+'px.');
	}
}


window.addEventListener('load', initComments, false );
window.addEventListener('resize', updateComments, false );
// Adding orientation change listener for iPad
window.addEventListener('orientationchange', updateComments, false );