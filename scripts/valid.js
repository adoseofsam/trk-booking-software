function validator()
{
var input = document.getElementsByName('newData')[0];	
var input2 = document.createElement('input');

   // input2.id = input.id;
    input2.name = input.name;
    input2.value = input.value;


 if(document.getElementById('Data').value==="Date"){
 	//document.getElementsByName('newData').type="date";
 	//alert(document.getElementsByName('newData').type);
 //	input2.type = 'date';
 //	input.parentNode.replaceChild(input2, input);

 	document.getElementsByName('newData')[0].setAttribute('type', 'date');
 	//document.getElementsByName('newData')[0].setAttribute('data-date-format', 'DD-YYYY-MM');
 }else if(document.getElementById('Data').value==="Time"){
 	document.getElementsByName('newData')[0].setAttribute('type', 'time');
 }else if(document.getElementById('Data').value==="Email"){
 	document.getElementsByName('newData')[0].setAttribute('type', 'email');
 }else{
 	document.getElementsByName('newData')[0].setAttribute('type', 'text');
 }

}