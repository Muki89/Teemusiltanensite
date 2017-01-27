function tervehdi(){
	var d = new Date();
	var n = d.getHours();
	document.getElementById("timer").innerHTML = n;
	var tervehdys = "Hyvää iltaa!";
	if(n>=6 && n<11){
		tervehdys = "Hyvää huomenta!";
		$('.jumbotron').css('background-image','url(images/jumbtron_city.jpg)');
	} else if(n>=11 && n<17){
		tervehdys = "Hyvää päivää!";
		$('.jumbotron').css('background-image','url(images/agriculture.jpg)');
	} else if((n>=0 && n<2) || (n>=3 && n<6)){
		tervehdys = "Hyvää yötä!";
		$('.jumbotron').css('background-image','url(images/northern-lights.jpg)');
	} else if(n>=2 && n<3){
		tervehdys = "Huu!";
		$('.jumbotron').css('background-image','url(images/owl.jpg)');
		var audio = new Audio('images/pollo.mp3');
		audio.play();
	} else if(n>=21 && n<24){
		var tervehdys = "Hyvää iltaa!";
		$('.jumbotron').css('background-image','url(images/cloudy-sunset.jpg)');
	} else{
		var tervehdys = "Hyvää iltaa!";
		$('.jumbotron').css('background-image','url(images/north-caroline.jpg)');
	}
	document.getElementById("tervehdi").innerHTML = tervehdys;
}

function tervehdiUudestaan(){
	
	var n = document.getElementById("timer").innerHTML;
	n++;
	if(n==24){
		n = 0;
	}
	document.getElementById("timer").innerHTML = n;

	
	if(n>=6 && n<11){
		tervehdys = "Hyvää huomenta!";
		$('.jumbotron').css('background-image','url(images/jumbtron_city.jpg)');
	} else if(n>=11 && n<17){
		tervehdys = "Hyvää päivää!";
		$('.jumbotron').css('background-image','url(images/agriculture.jpg)');
	} else if((n>=0 && n<2) || (n>=3 && n<6)){
		tervehdys = "Hyvää yötä!";
		$('.jumbotron').css('background-image','url(images/northern-lights.jpg)');
	} else if(n>=2 && n<3){
		tervehdys = "Huu!";
		$('.jumbotron').css('background-image','url(images/owl.jpg)');
		var audio = new Audio('images/pollo.mp3');
		audio.play();
	} else if(n>=21 && n<24){
		var tervehdys = "Hyvää iltaa!";
		$('.jumbotron').css('background-image','url(images/cloudy-sunset.jpg)');
	} else{
		var tervehdys = "Hyvää iltaa!";
		$('.jumbotron').css('background-image','url(images/north-caroline.jpg)');
	}
	document.getElementById("tervehdi").innerHTML = tervehdys;

}


