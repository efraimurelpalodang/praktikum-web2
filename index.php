<?php 
session_start();

if(!isset($_SESSION['id'])) {
  header('location: login/login_view.php');
}

include 'config/koneksi.php';
include 'templates/header.php';
$page = (!isset($_GET['page'])) ? "dashboard" : $_GET['page'];

switch($page) {
  case "dashboard":
    include 'dashboard/dashboard_view.php';
    break;
  case "pengguna":
    include 'pengguna/view_pengguna.php';
    break;
  case "anggota":
    include 'anggota/view_anggota.php';
    break;
  case "penggunaadd":
    include 'pengguna/create_pengguna.php';
    break;
  case "penggunadelete":
    include 'pengguna/delete_pengguna.php';
    break;
  case "penggunaedit":
    include 'pengguna/edit_pengguna.php';
    break;
    //! operasi anggota
    case "anggota":
      include 'anggota/view_anggota.php';
      break;
    case "anggota":
      include 'anggota/view_anggota.php';
      break;
    case "anggotaadd":
      include 'anggota/create_anggota.php';
      break;
    case "anggotadelete":
      include 'anggota/delete_anggota.php';
      break;
    case "anggotaedit":
      include 'anggota/edit_anggota.php';
      break;
  
}
include 'templates/footer.php';

?>