<?php
    include 'koneksi.php';
    $result = $conn->query("SELECT * FROM data_karyawan");
?>


<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP</title>
</head>
<body>
    <h1>Data Users</h1>
    <a href="tambahdata.php">Tambah User</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>alamat</th>
            <th>Jenis kemalin</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['emaill'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['jenis_kelamin'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>