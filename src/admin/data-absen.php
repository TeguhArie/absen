<?php
session_start();
include '../../config/conn.php';
if (isset($_SESSION['nama']) && isset($_SESSION['kelas'])) {
    $nama = $_SESSION['nama'];
    $kelas = $_SESSION['kelas'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            margin-top: 50px;
        }

        h1 {
            margin-top: 10px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 70px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        header{
            background-color: black;
            color: white;
            width: 100%;
            border-radius: 10px;
            transform: translateY(-20px);
        }

        nav {
            display: flex;
            justify-content: space-between;
            margin: 30px;
        }
        
        nav ul{
            display: flex;
            gap: 4rem;
            list-style: none;
        }
        
        ul li a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <div class="judul">
                    <h3>List Absen:
                        <?php echo $nama; ?>
                    </h3>
                </div>
                <ul>
                    <li><a href="">absen</a></li>
                    <li><a href="">ubah</a></li>
                    <li><a href="">absen</a></li>
                </ul>
            </nav>
        </header>
        <table>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Tanggal Absensi</th>
                <th>Alasan</th>
            </tr>
            <?php
            $select_absensi = mysqli_query($conn, "SELECT * FROM data_absen WHERE nama = '$nama' AND kelas = '$kelas'") or die('query failed');

            while ($row = mysqli_fetch_array($select_absensi)) {
                echo '<tr>';
                echo '<td>' . $row['nama'] . '</td>';
                echo '<td>' . $row['kelas'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '<td>' . date('Y-m-d H:i', strtotime($row['absen_datetime'])) . '</td>';
                echo '<td>' . $row['alasan'] . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</body>

</html>