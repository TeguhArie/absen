<?php
include '../config/conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
$id_to_delete = $_POST['id_to_delete'];

$query = "DELETE FROM data_absen WHERE id = $id_to_delete";

if ($conn->query($query) === TRUE) {
echo "Data deleted successfully";
header("Location: admin/admin.php");
} else {
echo "Delete failed: " . $conn->error;
}
}
?>