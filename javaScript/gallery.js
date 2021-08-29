//Manage the picture Slides
let slideIndex = 1;
let currentModal;

showSlide(slideIndex);

function currentSlide(n) {
	showSlide(slideIndex = n);
}

function showSlide(n) {
	let i;
	let slides = document.getElementsByClassName("slide");
	let dots = document.getElementsByClassName("demo");
	let captionText = document.getElementById("caption");
				
	if (n > slides.length) {slideIndex = 1}
	if (n < 1) {slideIndex = slides.length}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}

	slides[slideIndex - 1].style.display = "inline";
	dots[slideIndex - 1].className += " active";
	captionText.innerHTML = dots[slideIndex - 1].alt;
}

//Show Pictures in Fullscreen when clicked
let modal = document.getElementById("myModal");
let img = document.getElementsByClassName("shownIMG");
let modalImg = document.getElementById("ModalIMG");
let spanClose = document.getElementsByClassName("close")[0];
let spanPrev = document.getElementsByClassName("prevImg")[0];
let spanNext = document.getElementsByClassName("nextImg")[0];

function showModal(n){
	modal.style.display = "block";
	modalImg.src = img[n - 1].src;
	currentModal = n - 1;
}

spanClose.onclick = function() {
	modal.style.display = "none";
} 

spanPrev.onclick = function() {
	if(currentModal !== 0){
		modalImg.src = img[currentModal - 1].src;
		currentModal--;
        currentSlide(currentModal + 1);
	}
}

spanNext.onclick = function() {
	if(currentModal !== img.length - 1){
		modalImg.src = img[currentModal + 1].src;
		currentModal++;
        currentSlide(currentModal + 1);
	}
}