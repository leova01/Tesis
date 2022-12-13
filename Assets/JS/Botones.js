//Efecto de los botones
var animateButton = function (e) {
  e.preventDefault;
  //reset animation
  e.target.classList.remove("animate");

  e.target.classList.add("animate");
  setTimeout(function () {
    e.target.classList.remove("animate");
  }, 700);
};

var bubblyButtons = document.getElementsByClassName("bubbly-button");

for (var i = 0; i < bubblyButtons.length; i++) {
  bubblyButtons[i].addEventListener("click", animateButton, false);
}
//FinEfecto de los botones

//Desplazamiento de paginas
function log() {
  setTimeout(function () {
    //document.location.href = "./inic.php";
  }, 1000);
}
function reg() {
  setTimeout(function () {
    document.location.href = "./regis.php";
  }, 1000);
}
//Fin Desplazamiento de paginas
