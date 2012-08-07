
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


// Stylesheet switcher from ALA: http://www.alistapart.com/articles/alternate/

function setActiveStyleSheet(title) {
   var i, a, main;
   for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
     if(a.getAttribute("rel").indexOf("style") != -1
        && a.getAttribute("title")) {
       a.disabled = true;
       if(a.getAttribute("title") == title) a.disabled = false;
     }
   }
}

function setStyleSheet1(){
	setActiveStyleSheet('36 / 12 grid (default)');
	return false;
}

function setStyleSheet2(){
	setActiveStyleSheet('36 / 9 grid');
	return false;
}


function addStyleSheetSwitches(){
	var link1 = document.getElementById('36-12');
	var link2 = document.getElementById('36-9');
	if( link1 && link2 ){
		link1.addEventListener('click', setStyleSheet1, false );
		link2.addEventListener('click', setStyleSheet2, false );
	}
}

window.addEventListener('load', addStyleSheetSwitches, false );
