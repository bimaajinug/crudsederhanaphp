<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $emaill = $_POST['emaill'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $stmt = $conn->prepare("INSERT INTO data_karyawan (nama, emaill, alamat, jenis_kelamin) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $emaill, $alamat,$jenis_kelamin);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body>
    <h1>Tambah User</h1>
    <form method="post">
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>Email:</label>
        <input type="email" name="emaill" required><br>
        <label>alamat:</label>
        <input type="text" name="alamat" required><br>
        <label>jenis kemalin:</label>
        <input type="text" name="jenis_kelamin" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
