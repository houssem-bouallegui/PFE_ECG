function calcul(){
	var num=document.getElementById("nom").value;
	console.log(num);
	num = num * 100;
	console.log(num);
	var precision = 11000-num;
	console.log(precision);
}