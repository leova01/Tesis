function showLoader() {
    var loader = document.getElementById("loader");
    loader.style.display = "block";
}
/////////////////////////////////////////////////////////
const startCarouselBtn = document.getElementById('startCarouselBtn');
const carouselExampleControls = document.getElementById('carouselExampleControls');

startCarouselBtn.addEventListener('click', () => {
  carouselExampleControls.classList.add('slide');
});
