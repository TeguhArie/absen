<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <style>

body{
   background-image: url(bg.jpg); 
   background-repeat: no-repeat;
   background-size: cover;
    
}

.container{
        display :flex;
        justify-content: center;
    }
.signup {
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 2px;
        display: block;
        font-weight: bold;
        font-size: x-large;
        margin-top: 1.5em;
    }

    .card {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 350px;
        width: 400px;
        flex-direction: column;
        gap: 35px;
        border-radius: 15px;
        background: rgba(15, 15, 15, 0.76);
        box-shadow: 5px 5px 15px #c8c8c8, -0px -0px 15px #fefefe;
        border-radius: 8px;
    }

    .inputBox,
    .inputBox1 {
        position: relative;
        margin: 30px;
        width: 250px;
    }

    .inputBox input,
    .inputBox1 input {
        width: 100%;
        padding: 10px;
        outline: none;
        border: none;
        color: white;
        font-size: 1em;
        background: transparent;
        border-left: 2px solid #000;
        border-bottom: 2px solid #000;
        transition: 0.1s;
        border-bottom-left-radius: 8px;
    }

    .inputBox span,
    .inputBox1 span {
        margin-top: 5px;
        position: absolute;
        left: 0;
        transform: translateY(-4px);
        margin-left: 10px;
        padding: 10px;
        pointer-events: none;
        font-size: 12px;
        color: white;
        text-transform: uppercase;
        transition: 0.5s;
        letter-spacing: 3px;
        border-radius: 8px;
    }

    .inputBox input:valid~span,
    .inputBox input:focus~span,
    .inputBox1 input:valid~span,
    .inputBox1 input:focus~span {
        transform: translateY(-15px);
        font-size: 0.8em;
        padding: 5px 10px;
        background: #000;
        letter-spacing: 0.2em;
        color: #fff;
        border: 2px solid #fff;
    }

    .inputBox input:valid,
    .inputBox input:focus,
    .inputBox1 input:valid,
    .inputBox1 input:focus {
        border: 2px solid #fff;
        border-radius: 8px;
    }

    .enter {
        margin: 30px;
        height: 45px;
        width: 100px;
        border-radius: 5px;
        border: 2px solid #000;
        cursor: pointer;
        background-color: transparent;
        transition: 0.5s;
        text-transform: uppercase;
        font-size: 10px;
        letter-spacing: 2px;
        margin-bottom: 3em;
        text-decoration: none;
    }

    .enter:hover {
        background-color: rgb(0, 0, 0);
        color: white;
    }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <a class="signup">Register</a>
        <form action="" method="post">
            <div class="inputBox">
                <input type="text" name="username" required="required">
                <span>Nama</span>
            </div>
            <div class="inputBox">
                <input type="text" name="Kelas" required="required">
                <span>Kelas</span>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Password</span>
            </div>
            <button type="submit" class="enter">Daftar</button>

            <a href="login.php" class="enter">Login</a>
        </div>
    </div>
        </form>
    </div>
</div>
</body>
</html>
<?php
session_start();
include '../config/conn.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $username = isset($_POST['nama']) ? $conn->real_escape_string($_POST['nama']) : '';
//     $kelas = isset($_POST['kelas']) ? $conn->real_escape_string($_POST['kelas']) : '';
//     $password = isset($_POST['password']) ? $conn->real_escape_string($_POST['password']) : '';

//     $query = "INSERT INTO login(nama, kelas, password) VALUES ('$username', '$kelas', '$password')";

//     if ($conn->query($query) === TRUE) {
//         header ("Location: admin/admin.php");
//     } else {
//         echo "Data gagal disimpan ke database: " . $conn->error;
//     }
// }

if (isset($_POST['submit'])) {
    $username = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $password = $_POST['passwword'];

    $query = mysqli_query($conn, "INSERT INTO login(nama, kelas, password) VALUES ('$username', '$kelas', '$password')");
    if ($query) {
        header("Location: admin/admin.php");
    } else {
        echo "Data gagal disimpan ke database: " . $conn->error;
    }
}
?>