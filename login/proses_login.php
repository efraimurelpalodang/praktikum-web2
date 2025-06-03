<?php 

if($_SERVER["REQUEST_METHOD"] === "POST" ) {
  $user = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  include '../config/koneksi.php';
  $query =  $connect->prepare("SELECT * FROM pengguna WHERE username=? and password=md5(?)");
  $query->bind_param("ss", $user, $password);
  $query->execute();
  $cekLogin = $query->get_result();

  // pengecekan login
  if( $cekLogin->num_rows > 0 ) {
    $dataPengguna = $cekLogin->fetch_assoc();
    session_start();
    $_SESSION['id'] = $dataPengguna['id'];
    $_SESSION['username'] = $dataPengguna['username'];
    $_SESSION['role'] = $dataPengguna['role'];
    echo "<script>alert('Login berhasil');
    location.replace('../index.php?page=dashboard');</script>";
  } else {
    echo "<script>alert('Username atau Password Salah');
    location.replace('Login_view.php');</script>";
  }

}