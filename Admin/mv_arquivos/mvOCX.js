// ----------------------------------------------------------------------------------
var tamanhoAnterior = 0;
var myOCX    = null;
// ----------------------------------------------------------------------------------

// ----------------------------------------------------------------------------------
function _criarOCX(ocx)
{
	if (myOCX != null) {
		if (myOCX.name != ocx) {
			divOCX.removeChild(myOCX);
			myOCX = null;			
		}
		else {
			return myOCX;
		}
	}
	myOCX        = document.createElement('object');
	myOCX.name   = ocx;
	myOCX.id	 = 'myOCXID';

	if (ocx == 'ActiveFormMvEditor')
	{
		myOCX.classid= "clsid:1D91A90A-EEF4-4415-8AD7-ED512CFA3AAB";
	}
	else if (ocx == 'AxEditorLaudo')
	{
		myOCX.classid= "clsid:3796E380-7A7B-4F54-A80B-679F73E6AEB4";
	}
	else if (ocx == 'AxEditorPsdi')
	{
		myOCX.classid= "clsid:DB0587B1-907A-48D1-9AD2-916A2A381110";
	}
	
	myOCX.width  = divOCX.width  > 0 ? divOCX.width  : 1;
	myOCX.height = divOCX.height > 0 ? divOCX.height : 1;
	
	divOCX.appendChild(myOCX);
    
	return myOCX;
}

function verificarOCX(ocx)
{
	if (myOCX != null) {
		if (myOCX.name != ocx) {
			_criarOCX(ocx);
			return true;
		}
		else {
			return false;
		}
	}
	else {
		return false;
	}
	
}

function setDivOCX()
{
  if(myOCX){ 
	  myOCX.width  = divOCX.width;
	  myOCX.height = divOCX.height;
  }
}

function resizeOCX(ocxMarginBottom, x, y, screenWidth, screenHeight){

  if(divOCX.style.visibility == 'visible'){
	var ocxMarginRight  = 10;
		  
	screenWidth  = screenWidth  - ocxMarginRight;
	screenHeight = screenHeight - ocxMarginBottom;
		 
	if(myOCX){ 
	  divOCX.style.left = x;
	  divOCX.style.top = y;
	  divOCX.width  = screenWidth;
	  divOCX.height = screenHeight;
	  myOCX.width  = screenWidth;
	  myOCX.height = screenHeight;
	}
  }
}


function hiddenDivVisibility(state){
	if(divOCX.style.visibility!='hidden'){
		divOCX.style.visibility = 'hidden';
		return true;
	}
	return false;
}
function showDivVisibility(state){
	divOCX.style.visibility = 'visible';
}


function verifyBrowserName(state) {
	return navigator.appName.toUpperCase();
}

function appResizeHandler(applicationName)
{
	var swf = parent.document.getElementById(applicationName);
	swf.externalResizeHandler();
	
}

function resizeOCXContainer(x,y,w,h) {
    var divOCX=document.getElementById("divOCX");

    divOCX.style.left=x;
    divOCX.style.top=y;
	divOCX.width=w;
	divOCX.height=h;

	setDivOCX();
}
 
function showOCXContainer(){
	document.getElementById("divOCX").style.visibility="visible";
}

function hideOCXContainer(){
    document.getElementById("divOCX").style.visibility="hidden";
}

function setOCXContainerVisibility(visible){
	
	if(visible == true)
		showOCXContainer();
	else
		hideOCXContainer();
}
