const answer = document.getElementById("answer");
const firstName = document.getElementById("firstName");
const form = document.getElementById("formy");

const red = '#F44336';


function validateFirstName(){
	if(checkIfEmpty(firstName))
		return;
	if(!checkIfOnlyLetters(firstName))
		return;
	return true;
	
}
function validateAnswer(){
	if(checkIfEmpty(answer))
		return;
	return true;
}

	
function checkIfEmpty(field){
	if(isEmpty(field.value.trim())){
		setInvalid(field,`this field must not be empty`);
		return true;
	}
	else {
		setValid(field);
		return false;
	}
	}
	
	function isEmpty(value){
		if (value==='')return true;
		return false;
	}
	
function checkIfOnlyLetters(field)
{
	if(/^[a-zA-Z ]+$/.test(field.value)){
		setValid(field);
		return true;
	}
	else {
		setInvalid(field,`Names must contain only letters`);
		return false;
		}
}

	
	
function setInvalid(field, message){
	field.className='invalid';
	field.nextElementSibling.innerHTML = message;
	field.nextElementSibling.style.color = red;

}

function setValid(field){
	field.className='valide';
	field.nextElementSibling.innerHTML='';
}	
