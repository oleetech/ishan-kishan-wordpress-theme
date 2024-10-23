const bgImages = [
  'url("https://www.dhl.com/discover/content/dam/bangladesh/desktop/e-commerce-advice/e-commerce-sector-guides/bangladesh-jute-exports-and-global-demand/jute-export-1920x998.jpg")',
  'url("https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjXw_a0ySzQyWSdmcZQGlaU8DD8SX9FwyGVh2-of5Be88Ix3LUfJktgCkka4fQ2wYgI3D-ewLgpV-hnBPJlB8MaNZa1fY53im6NXdKS3kDl9WsRlLVGyyS8ZmNAG9sZeCWUeQnsrNl90EU/w1200-h630-p-k-no-nu/60056_handicraft.jpg")',
  'url("https://good-time-invest.com/wp-content/uploads/2021/12/cropped-tractor.jpg")',
  'url("https://acimotors-bd.com/assets/images/product/atumobile/foton/1-ton-pickup-tm-series/1-ton-tm.jpg")',
];

let currentImageIndex = 0;
const bgCarousel = document.getElementById("bgCarousel");

function createImageElement(url) {
  const img = document.createElement("div");
  img.style.backgroundImage = url;
  img.style.position = "absolute";
  img.style.inset = "0";
  img.style.backgroundSize = "cover";
  img.style.backgroundPosition = "center";
  img.style.opacity = "0";
  img.style.transition = "opacity 1s ease-in-out, transform 5s ease-in-out";
  img.style.filter = "blur(3px) brightness(0.5)"; // Add backdrop blur and decrease brightness
  return img;
}

function changeBackground() {
  const nextImageIndex = (currentImageIndex + 1) % bgImages.length;
  const currentImage = createImageElement(bgImages[currentImageIndex]);
  const nextImage = createImageElement(bgImages[nextImageIndex]);

  bgCarousel.innerHTML = "";
  bgCarousel.appendChild(currentImage);
  bgCarousel.appendChild(nextImage);

  setTimeout(() => {
    currentImage.style.opacity = "1";
    currentImage.style.transform = "scale(-1.1)";
  }, 100);

  setTimeout(() => {
    nextImage.style.opacity = "1";
    nextImage.style.transform = "scale(1.1)";
    currentImage.style.opacity = "0";
  }, 400);

  currentImageIndex = nextImageIndex;
}

changeBackground();
setInterval(changeBackground, 5000);
