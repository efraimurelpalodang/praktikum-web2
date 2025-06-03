<?php 

if(isset($_POST['proses'])) {
  $id = htmlspecialchars($_POST['id']);
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $role = htmlspecialchars($_POST['role']);
  $cekUsername = $connect->query("SELECT * FROM pengguna WHERE username='$username' AND id <> '$id'");
  if($cekUsername->num_rows > 0) {
    echo "<script>alert('username sudah terdaftar di sistem');
    location.replace('?page=penggunaedit&id=$id');</script>";
  } else {
    $hashedPassword = md5($password); // atau gunakan password_hash untuk lebih aman
    $query = $connect->prepare("UPDATE pengguna SET username=?, role=? WHERE id=?");
    $query->bind_param("sss", $username, $role, $id);
    if($query->execute()) {
      if(isset($password) && $password != "") {
        $query = $connect->prepare("UPDATE pengguna SET password=md5(?) WHERE id=?");
        $query->bind_param("ss", $password, $id);
        $query->execute();
      }
      echo "<script>alert('Data Pengguna Berhasil diubah!!'); location.replace('?page=pengguna');</script>";
    }
  }
}

$id = $_GET['id'];
$query = $connect->query("SELECT * FROM pengguna WHERE id='$id'");
$pengguna = $query->fetch_assoc();

?>


<div class="container mt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Update Data Anggota</h4>
        </div>
        <div class="card-body">
          <a href="?page=pengguna" class="btn btn-primary btn-sm mb-4"><i class="bi bi-arrow-left-short"></i> Kembali</a>
          <form action="" method="post">
            <input type="hidden" name="id" value="<?= $pengguna['id']; ?>">
            <div class="mb-2">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control" required value="<?= $pengguna['username']; ?>">
            </div>
            <div class="mb-2">
              <label for="password">password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-2">
              <label for="role">Role</label>
              <select name="role" id="role" class="form-control" required>
                <option value="">Pilih Role</option>
                <option value="admin" <?php if($pengguna['role']== 'admin') echo 'selected'; ?> >Admin</option>
                <option value="bendahara" <?php if($pengguna['role']== 'admin') echo 'selected'; ?> >Bendahara</option>
              </select>
            </div>

            <button type="reset" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-repeat"></i> Ulang</button>
            <button type="submit" name="proses" class="btn btn-primary btn-sm"><i class="bi bi-save"></i> Simpan</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>