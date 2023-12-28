<?php
if (isset($_POST['login'])) {
   echo "ini login";
}

if (isset($_POST['register'])) {
   echo "ini register";
}
?>

<?php
session_start();
require_once "../../config/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nama = $_POST["nama"];
   $password = $_POST["password"];

   $query = "SELECT * FROM login WHERE nama='$nama'";
   $result = $conn->query($query);

   if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      if ($password === $row["password"]) {
         $_SESSION["user_id"] = $row["id"];

         if ($row["role"] === "admin") {
            header("location: admin.php");
         } else if ($row["role"] != "admin") {
            header("location: ../client/users.php");
         }
      } else {
         header("location: home.php?error=Nama atau Password Salah");
      }
   } else {
      header("location: home.php?error=Nama atau Password Salah");
   }
}
?>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="stylesheet" href="../css/regist.css">
   <link rel="stylesheet" href="../css/load.css"> 
</head>
   
<body>
   <?php if (isset($_GET['error'])) { ?>
      <p class="error">
         <?php echo $_GET['error']; ?>
      </p>
   <?php } ?>

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
                     <div class="title">Log in</div>
                     <form action="" method="post" class="flip-card__form">
                        <input type="username" placeholder="nama" name="nama" class="flip-card__input">
                        <input type="password" placeholder="Password" name="password" class="flip-card__input">
                        <button class="flip-card__btn" name="login">Let`s go!</button>
                     </form>
                  </div>
                  <div class="flip-card__back">
                     <div class="title">Sign up</div>
                     <form action="" method="post" class="flip-card__form">
                        <input type="name" placeholder="Name" name="username" class="flip-card__input">
                        <input type="kelas" placeholder="kelas" name="kelas" class="flip-card__input">
                        <input type="password" placeholder="Password" name="password" class="flip-card__input">
                        <button class="flip-card__btn" name="register">Confirm!</button>
                     </form>
                  </div>
               </div>
            </label>
         </div>
      </div>
   </div>
   <script src="../js/loadhome.js"></script>
</body>

</html>
<?php
if (isset($_POST['register'])) {
   $username = $_POST['username'];
   $kelas = $_POST['kelas'];
   $password = $_POST['password'];

   $query = mysqli_query($conn, "INSERT INTO login(nama, kelas, password) VALUES ('$username', '$kelas', '$password')");
   if ($query) {
      header("Location: regist.php");
   } else {
      echo "Data gagal disimpan ke database: " . $conn->error;
   }
}
?>