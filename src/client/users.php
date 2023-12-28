<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>absen</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            background: url("../../img/mk.svg") no-repeat;
            background-size: cover;
            transform: translateY(40px);
        }

        header {
            background-color: black;
            padding: 25px 0;
            transform: translateY(-40px);
        }

        header a {
            text-decoration: none;
            color: white;
            margin: 0 15px;
        }

        .text {
            margin-left: 130px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .user-profil {
            width: 20rem;
            padding: 50px;
            background-color: rgba(255, 255, 255, 0.4);
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 7px 7px 4px rgba(0, 0, 0, 0.5);
            margin-bottom: 100px;
        }

        h2 {
            margin-top: 0;
            text-align: center;
        }

        form {
            margin-top: 20px;
            font-size: 17px;
            font-family: Arial, Helvetica, sans-serif;
        }

        label {
            display: block;
            margin-bottom: 30px;
            font-weight: bold;
        }

        select,
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 15px;
            background-color: rgba(255, 255, 255, 0.4);
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 15px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <a class="text" href="users.php">Absen</a>
            <a href="data-absen.php">Daftar Absen</a>
            <a href=" sql/delete.php?id=<?php echo $id['id']; ?>">hapus</a>
        </nav>
    </header>

    <div class="container">
        <div class="user-profil">
            <?php
            session_start();
            include '../../config/conn.php';
            $user_id = $_SESSION['user_id'];

            $select_user = mysqli_query($conn, "SELECT * FROM `login` WHERE id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select_user) > 0) {
                $fetch_user = mysqli_fetch_assoc($select_user);
            }
            ?>


            <?php
            date_default_timezone_set('Asia/Jakarta');

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nama = $fetch_user['nama'];
                $kelas = $fetch_user['kelas'];
                $absen_Datetime = date('Y-m-d H:i');
                $status = $_POST['status'];
                $alasan = isset($_POST['reason']) ? $_POST['reason'] : '';

                $query = "INSERT INTO data_absen (nama, kelas, absen_datetime, status, alasan) 
                VALUES ('$nama', '$kelas', '$absen_Datetime', '$status', '$alasan')";

                if ($conn->query($query) === TRUE) {
                    header("Location: ../admin/data-absen.php");
                } else {
                    echo "Error: " . $conn->error;
                }

                $conn->close();
            }
            ?>

            <?php
            $_SESSION['nama'] = $fetch_user['nama'];
            $_SESSION['kelas'] = $fetch_user['kelas'];
            ?>

            <h2>Absensi Siswa</h2>
            <form method="post">
                Nama:
                <?php echo $fetch_user['nama']; ?><br>
                Kelas:
                <?php echo $fetch_user['kelas']; ?><br>
                <?php echo date('Y-m-d H:i'); ?><br>
                Status:
                <select name="status">
                    <option value="Hadir">Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                </select><br>
                <div id="reason" style="display:none;">
                    Alasan: <input type="text" name="reason"><br>
                </div>
                <input type="submit" value="ABSEN">
            </form>

            <script>
                document.querySelector('select[name="status"]').addEventListener('change', function () {
                    if (this.value === 'Sakit' || this.value === 'Izin') {
                        document.getElementById('reason').style.display = 'block';
                    } else {
                        document.getElementById('reason').style.display = 'none';
                    }
                });
            </script>
        </div>
    </div>
</body>

</html>