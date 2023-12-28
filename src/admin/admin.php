<?php
session_start();
include '../../config/conn.php';


$search_type = isset($_POST['search_type']) ? $_POST['search_type'] : '';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
$result = mysqli_query($conn, "SELECT * FROM data_absen");



if ($_SERVER['REQUEST_METHOD'] === "POST" && $search_type === "nama_kelas") {
    $result = mysqli_query($conn, "SELECT * FROM data_absen WHERE nama = '$nama' AND kelas = '$kelas'") or die('query failed');
} elseif ($_SERVER['REQUEST_METHOD'] === "POST" && $search_type === "kelas") {
    $result = mysqli_query($conn, "SELECT * FROM data_absen WHERE kelas = '$kelas'") or die('query failed');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            overflow: hidden;
            margin-top: 30px;
            margin-left: 50px;
        }

        h1 {
            margin-top: 10px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 70px;
            text-align: center;
            transform: translateZ(10px);
        }

        th,
        td {
            padding: 10px 10px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            /* background-color: #f2f2f2; */
            background-color: #ddd;
        }

        form {
            margin-left: 100px;
            margin-top: 50px;
        }

        .form2 .input {
            background-color: #C69749;
            height: 25px;
            width: 60px;
            border: 0.1px solid black;
            border-radius: 10px;
        }

        select {
            border: none;
        }

        select:hover {
            transition: 1s ease-in-out;
            border-bottom: 1px solid black;

        }

        .search {
            border: none;
            width: 400px;
            border-radius: 20px;
        }

        .search:hover {
            border-bottom: 1px solid black;
            transition: 1s ease-in-out;

        }

        .cari {
            background-color: rgba(43, 63, 72, 0.45);
            border-radius: 50%;
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
    <form method="post">
        <select name="search_type" id="search_type" onchange="toggleNamaInput()">
            <option value="">pilih</option>
            <option value="kelas">Kelas</option>
            <option value="nama_kelas">Nama dan Kelas</option>
        </select>

        <div id="nama_div" style="display: none;">
            <input type="text" name="nama" id="nama" class="search" placeholder="nama">
        </div>

        <input type="text" name="kelas" id="kelas" class="search" placeholder="kelas:">

        <button value="cari" class="cari"><i class="ri-search-2-line"></i></button>
    </form>
    <div class="container">
        <h1>DATA ABSEN</h1>
        <table>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Tanggal Absensi</th>
                <th>Alasan</th>
                <th>opsi</th>
            </tr>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['nama'] . '</td>';
                    echo '<td>' . $row['kelas'] . '</td>';
                    echo '<td>' . $row['status'] . '</td>';
                    echo '<td>' . date('Y-m-d H:i', strtotime($row['absen_datetime'])) . '</td>';
                    echo '<td>' . $row['alasan'] . '</td>';
                    echo '<td>
                      <form action="../delete.php" method="post" class="form2">
                          <input type="hidden" class="input" name="id_to_delete" value="' . $row['id'] . '">
                          <input type="submit" class="input" name="delete" value="Delete">
                      </form>
                  </td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">Data tidak ditemukan.</td></tr>';
            }
            ?>
        </table>
    </div>
    <script>
        function toggleNamaInput() {
            let searchType = document.getElementById("search_type").value;
            let namaInput = document.getElementById("nama_div");

            if (searchType === "nama_kelas") {
                namaInput.style.display = "block";
            } else {
                namaInput.style.display = "none";
            }

            searchType.addEventListener("keyup", () => {
                if (searchType.value === "nama_kelas") {
                    namaInput.style.display = "block";
                } else {
                    namaInput.style.display = "none";
                }
            });
        }

    </script>
</body>

</html>