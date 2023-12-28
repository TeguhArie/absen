document.addEventListener("DOMContentLoaded", function () {
  const wifiLoader = document.getElementById('wifi-loader');
  const homeContent = document.getElementById('home-content');
  const waktuLoading = 3000;

  setTimeout(function () {
    wifiLoader.style.display = 'none';
    homeContent.style.display = 'block'; 
  }, waktuLoading);
});