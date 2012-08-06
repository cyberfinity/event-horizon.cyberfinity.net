
var idPrefix = "comment-";
var nextElement = "demotext";

var lastWidth = 0;
var lastHeight = 0;
var lastContentWidth = 0;

// Append a comment after the element with the given id
function prependComment( id, comment ){
	var element = document.getElementById( id );
	if( element ){
		// Create paragraph with comment
		var commentPara = document.createElement('p');
		commentPara.setAttribute( 'id', idPrefix+id );
		commentPara.appendChild( document.createTextNode( comment ) );
		
		// Insert before element
		element.parentElement.insertBefore( commentPara, element );
		
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
	
	// Height
	lastHeight = document.documentElement.clientHeight;
	
	// Main content width
	lastContentWidth = document.getElementById("mainbody").clientWidth
	
	var comment = "Javascript says that this section is "+lastContentWidth+"px wide and the browser window is "+lastWidth+"x"+lastHeight+"px.";
	
	prependComment(nextElement,comment);
		
}
		
function updateComments(){
	// Width
	lastWidth = document.documentElement.clientWidth;
	
	// Height
	lastHeight = document.documentElement.clientHeight;
	
	// Main content width
	lastContentWidth = document.getElementById("mainbody").clientWidth
	
	var comment = "Javascript says that this section is "+lastContentWidth+"px wide and the browser window is "+lastWidth+"x"+lastHeight+"px.";
	
	replaceComment(nextElement,comment);

}


window.addEventListener('load', initComments, false );
window.addEventListener('resize', updateComments, false );
// Adding orientation change listener for iPad
window.addEventListener('orientationchange', updateComments, false );