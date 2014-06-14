//email address
function email1(input){
	return input.match(/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/);
}

// date entry
function dateEntry(input){
  if (input==""){
    return true;
  }else{
	  return input.match(/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/);
	}
}

// numbers only
function numeric(input){
	return input.match(/^[0-9.,]+$/);
}

//letters only
function alphabet(input){
	return input.match(/^[a-zA-Z\s]+$/);
}

//letters and/or numbers
function alphaNumeric(input){
	return input.match(/^[a-zA-Z0-9_]+$/);
}

//letters and/or spaces
function word(input){
	return input.match(/^[a-zA-Z\s]+$/);
}

//letters, spaces, apostrophe, accented characters
function wordFr(input){
	return input.match(/^[a-zA-Z\u00C0-\u00FF\s']*$/);
}

function date(input){
	var success = true;
	var tmp = input.split("-");
	if(tmp.length==3){
		var month = tmp[1];
		var day = tmp[2];	
		var year = tmp[0];		
	}
	else{
		var month = $("month").value;
		var day = $("day").value;	
		var year = $("year").value;	
	}
	
	var DateVal = month + "/" + day + "/" + year;
	var dt = new Date(DateVal);
	if(dt.getDate()!=day)	success = false;
	else if(dt.getMonth()!=month-1)	success = false;
	else if(dt.getFullYear()!=year)	success = false ;

	return success;
}

//password (at least 5 characters)
function password(input){
	return input.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/);	
}

//<> not allowed
function noScript(input){
	return !input.match(/[<>]+/);
}

//remove spaces
 function removespace(data){
	var str=data.replace(/\s+/g,"");
	var filtered_data=lowercase(str);
	return filtered_data;
 }
 
 function lowercase(data){
	 var str=data.toLowerCase(); 
	 return str;
 }