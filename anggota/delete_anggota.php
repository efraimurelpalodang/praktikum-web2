<?php 

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = $connect->prepare('DELETE FROM pengguna WHERE id=?');
  $query->bind_param("s", $id);
  if($query->execute()) {
    echo "<script>alert('DATA BERHASIL DI HAPUS'); location.replace('?page=pengguna')</script>";
    include_once 'view_pengguna.php';
  }
}

?>