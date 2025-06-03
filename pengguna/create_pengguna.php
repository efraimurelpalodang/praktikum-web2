<?php 

if(isset($_POST['proses'])) {
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $role = htmlspecialchars($_POST['role']);
  $cekUsername = $connect->query("SELECT * FROM pengguna WHERE username='$username'");
  if($cekUsername->num_rows > 0) {
    echo "<script>alert('username sudah terdaftar di sistem');
    location.replace('?page=penggunaadd');</script>";
  } else {
    $hashedPassword = md5($password); // atau gunakan password_hash untuk lebih aman
    $query = $connect->prepare("INSERT INTO pengguna (username, password, role) VALUES (?, ?, ?)");
    $query->bind_param("sss", $username, $hashedPassword, $role);
    if($query->execute()) {
      echo "<script>alert('Data Pengguna Berhasil ditambahkan!'); location.replace('?page=pengguna');</script>";
    }
  }
}

?>


<div class="container mt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Tambah Data Pengguna</h4>
        </div>
        <div class="card-body">
          <a href="?page=pengguna" class="btn btn-primary btn-sm mb-4"><i class="bi bi-arrow-left-short"></i> Kembali</a>
          <form action="" method="post">
            <div class="mb-2">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-2">
              <label for="password">password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-2">
              <label for="role">Role</label>
              <select name="role" id="role" class="form-control" required>
                <option value="">Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="bendahara">Bendahara</option>
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