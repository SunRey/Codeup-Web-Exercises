'use strict';

//set var(s) to get document classes & ids
var numberButtonClassCount = document.getElementsByClassName('buttonNumber');
var operatorButtonCount = document.getElementsByClassName('operators');
var input1 = document.getElementById('rOperand'),
    input2 = document.getElementById('lOperand'),
    operator = document.getElementById('operator');

//function city: (1) clear clac, get values for (2)button & (3)operator pressed, (4)calculate and return result
function clearCalc() { location.reload(); }

function getButtonValue () {
    if (operator.value == '') {
    	input1.value += (this.getAttribute('data-value'));
    } else {
    	input2.value += (this.getAttribute('data-value'));
	}
}

function setOperator () {
    operator.value = this.getAttribute('data-value');
    input2.focus(); 
}

function setDecimalPlace () {
	if (operator.value == '') {
		input1.value += onlyOneDecimal(input1.value);
	} else {
		input2.value += onlyOneDecimal(input2.value);
	}
}
function onlyOneDecimal(inputValue) {
	var n = inputValue.indexOf('.');
	return (n != -1) ? '' : '.';
}

function calculateThis () {
    var operation = document.getElementById('operator').value,
    	leftNum = Number(input1.value),
    	rightNum = Number(input2.value),
    	returnValue = eval(leftNum + operation + rightNum);
    document.getElementById('result').innerHTML = returnValue;
}

//add event listeners for button classes & Id's
for(var i=0; i < numberButtonClassCount.length; i++) {
    numberButtonClassCount[i].addEventListener('click', getButtonValue, false);
}

for(var i=0; i < operatorButtonCount.length; i++) {
    operatorButtonCount[i].addEventListener('click', setOperator, false);
}

document.getElementById('compare').addEventListener('click', calculateThis, false);
document.getElementById('dot').addEventListener('click', setDecimalPlace, false);
document.getElementById('refresh').addEventListener('click', clearCalc, false);

// 
