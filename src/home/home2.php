<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>home</title>
    <link rel="stylesheet" href="../css/home.css" />
  </head>
  <body>
    <div class="light-button">
      <button class="bt" id="myButton">
        <div class="light-holder">
          <div class="dot"></div>
          <div class="light"></div>
        </div>
        <div class="button-holder">
          <p>SMKN 17</p>
        </div>
      </button>
    </div>
    <div class="text-masuk">xz
      <h1>
        SELAMAT DATANG DI WEBSITE<br />
        ABSEN KEHADIRAN SMKN 17 JAKARTA
      </h1>
      <h4>silahkan klik next dibawah ini untuk melanjutkan</h4>
    </div>
      <button id="Button">
        <div class="next">
          <h2>N E X T</h2>
        </div>
        <div id="clip">
          <div id="leftTop" class="corner"></div>
          <div id="rightBottom" class="corner"></div>
          <div id="rightTop" class="corner"></div>
          <div id="leftBottom" class="corner"></div>
        </div>
        <span id="rightArrow" class="arrow"></span>
        <span id="leftArrow" class="arrow"></span>
      </button>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path
        fill="#fff"
        fill-opacity="1"
        d="M0,0L40,48C80,96,160,192,240,234.7C320,277,400,267,480,218.7C560,171,640,85,720,74.7C800,64,880,128,960,165.3C1040,203,1120,213,1200,186.7C1280,160,1360,96,1400,64L1440,32L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"
      ></path>
    </svg>
  </body>
</html>
<script>
  document.getElementById("myButton").addEventListener("click", function () {
    location.reload();
  });

  document.getElementById("Button").addEventListener("click", function () {
    window.location = "../admin/regist.php";
  });
</script>
