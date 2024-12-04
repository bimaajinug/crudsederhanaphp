<?php
include 'koneksi.php';

$id = $_GET['id'];
$karyawan = $conn->query("SELECT * FROM data_karyawan WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $emaill = $_POST['emaill'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $stmt = $conn->prepare("UPDATE data_karyawan SET nama = ?, emaill = ?, alamat = ?, jenis_kelamin = ?  WHERE id = ?");
    $stmt->bind_param("ssssi", $nama, $emaill, $alamat,$jenis_kelamin, $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="post">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $karyawan['nama'] ?>" required><br>
        <label>Email:</label>
        <input type="email" name="emaill" value="<?= $karyawan['emaill'] ?>" required><br>
        <label>alamat:</label>
        <input type="text" name="alamat" value="<?= $karyawan['alamat'] ?>" required><br>
        <label>jenis_kelamin:</label>
        <input type="text" name="jenis_kelamin" value="<?= $karyawan['jenis_kelamin'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
