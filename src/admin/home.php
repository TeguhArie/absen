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

            if ($row["role"] == "admin") {
                header("location: admin.php");
            } else {
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="overlay"></div>
    <div class="login-container">
        <h1>Login</h1>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error">
                <?php echo $_GET['error']; ?>
            </p>
        <?php } ?>
        <form method="post">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>