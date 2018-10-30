alert('Fuck you');


var movieName = "";

function revealMessage(){
	document.getElementById("hiddenMessage").style.display = 'block';
}
function alertFunction(){
	alert('Fuck you Again!');
}
function takeInput(something){
	movieName =  something;
	alert('movieName = ' + movieName);
}

function hideMovieReadMore(){
	$(".custom-p").hide();
}