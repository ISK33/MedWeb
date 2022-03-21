const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const email = document.getElementById("email");
const Password = document.getElementById("password");

const form = document.getElementById("myform");


const green= '#4CAF50';
const red= '#F44336';



function validateFirstName(){
	if(checkIfEmpty(firstName))
		return;
	if(!checkIfOnlyLetters(firstName))
		return;
	return true;
	
}

function validateLastName(){
	if(checkIfEmpty(lastName))
		return false;
	if(!checkIfOnlyLetters(lastName))
		return;
	return true;
	
}

function validateEmail(){
	if (checkIfEmpty(email))
		return;
	if (!containsCharacters(email,2))
		return;
	return true;
}

function validatePassword(){
	if(checkIfEmpty(password)) 
		return;
	if(!containsCharacters(password,1))
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
	

function setInvalid(field, message){
	field.className='invalid';
	field.nextElementSibling.innerHTML = message;
	field.nextElementSibling.style.color = red;

}

function setValid(field){
	field.className='valide';
	field.nextElementSibling.innerHTML='';
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

function containsCharacters(field, code){
	let regEx;
	switch(code){
		case 1:
		regEx= /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/i;
		return matchWithRegEx(regEx , field, 'password must contains at least 8 characters ,one uppercase , one lowercase and one special character');
		
		case 2:
		regEx: /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$|^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
		return matchWithRegEx (regEx , field ,`must be a valid email address`);
		
		default:
		return false;
		
	}
	}
	
	function matchWithRegEx (regEx , field , message){
		if(field.value.match(regEx)){
			setValid(field);
			return true;
		} else {
			setInvalid(field , message);
			return false;
		}
	}
