
var idPrefix = "comment-";
		
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
	appendComment('width','Javascript says that width is: '+document.documentElement.clientWidth+'px.');
	// Height
	appendComment('height','Javascript says that height is: '+document.documentElement.clientHeight+'px.');
	// Device Width
	appendComment('dev-width','Javascript says that device width is: '+screen.width+'px.');
	// Device Height
	appendComment('dev-height','Javascript says that device height is: '+screen.height+'px.');			
}
		
function updateComments(){
	// Width
	replaceComment('width','Javascript says that width is: '+document.documentElement.clientWidth+'px.');
	// Height
	replaceComment('height','Javascript says that height is: '+document.documentElement.clientHeight+'px.');
	// Device Width
	replaceComment('dev-width','Javascript says that device width is: '+screen.width+'px.');
	// Device Height
	replaceComment('dev-height','Javascript says that device height is: '+screen.height+'px.');
}


window.addEventListener('load', initComments, false );
window.addEventListener('resize', updateComments, false );