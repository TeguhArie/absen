 <?php
 if (isset($_POST['login'])) {
   echo  "ini login";
}

if (isset($_POST['register'])) {
   echo  "ini register";
}
 ?>
 <html>
<title>home</title>  
   <head>
<script src="loadhome.js"></script>
<link rel="stylesheet" href="regist.css"> 
<link rel="stylesheet" href="load.css"> 
  </head>
  <body>
  <div id="wifi-loader">
    <svg class="circle-outer" viewBox="0 0 86 86">
        <circle class="back" cx="43" cy="43" r="40"></circle>
        <circle class="front" cx="43" cy="43" r="40"></circle>
        <circle class="new" cx="43" cy="43" r="40"></circle>
    </svg>
    <svg class="circle-middle" viewBox="0 0 60 60">
        <circle class="back" cx="30" cy="30" r="27"></circle>
        <circle class="front" cx="30" cy="30" r="27"></circle>
    </svg>
    <svg class="circle-inner" viewBox="0 0 34 34">
        <circle class="back" cx="17" cy="17" r="14"></circle>
        <circle class="front" cx="17" cy="17" r="14"></circle>
    </svg>
    <div class="text" data-text="loading">
    </div>
    </div>

<div id="home-content" style="display: none;">
   <div class="wrapper">
    <div class="card-switch">
        <label class="switch">
           <input class="toggle" type="checkbox">
           <span class="slider"></span>
           <span class="card-side"></span>
           <div class="flip-card__inner">
              <div class="flip-card__front">
                 <div class="title">Log in
                 </div>
                 <form action="" method="post" class="flip-card__form">
                    <input type="username" placeholder="nama" name="nama" class="flip-card__input">
                    <input type="password" placeholder="Password" name="password" class="flip-card__input">
                    <button class="flip-card__btn" name="login">Let`s go!</button>
                 </form>
              </div>
              <div class="flip-card__back">
                 <div class="title">Sign up</div>
                 <form action="" method="post" class="flip-card__form">
                    <input type="name" placeholder="Name" class="flip-card__input">
                    <input type="kelas" placeholder="kelas" class="flip-card__input">
                    <input type="email" placeholder="Email" name="email" class="flip-card__input">
                    <input type="password" placeholder="Password" name="password" class="flip-card__input">
                    <button class="flip-card__btn" name="register">Confirm!</button>
                 </form>
              </div>
           </div>
        </label>
    </div>   
   </div>
   </div>
</body>
</html>