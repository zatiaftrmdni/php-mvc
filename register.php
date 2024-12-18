<?php
session_start();
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];  // Mengambil role yang dipilih dari form

    // Memasukkan data ke database
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    
    if ($conn->query($query)) {
        echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal. Silakan coba lagi.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Registrasi Anggota Baru</h2>
        <form method="POST" class="mt-4">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Pilih Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="calon_anggota">Calon Anggota</option>
                    <option value="admin">Admin</option>
                    <option value="pimpinan">Pimpinan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success" name="register">Daftar</button>
        </form>
        <p class="mt-3">Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>
