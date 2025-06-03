<?php 

if(isset($_POST['proses'])) {
  $id = htmlspecialchars($_POST['id']);
  $nik_ktp = htmlspecialchars($_POST['nik_ktp']);
  $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $no_hp = htmlspecialchars($_POST['no_hp']);
  $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
  $jk = htmlspecialchars($_POST['jk']);
  $status = htmlspecialchars($_POST['status']);
  $cekNik = $connect->query("SELECT * FROM anggota WHERE nik_ktp='$nik_ktp' AND id <> '$id'");
  if($cekNik->num_rows > 0) {
    echo "<script>alert('nik ktp sudah terdaftar');
    location.replace('?page=anggotaedit&id=$id');</script>";
  } else {
    $query = $connect->prepare("UPDATE anggota SET nik_ktp=?, nama_lengkap=?, alamat=?, no_hp=?, tanggal_lahir=?, jk=?, status=? WHERE id=?");
    $query->bind_param("ssssssss", $nik_ktp, $nama_lengkap, $alamat, $no_hp, $tanggal_lahir, $jk, $status, $id);
    if($query->execute()) {
      echo "<script>alert('Data Anggota Berhasil di perbaharui!!'); location.replace('?page=anggota');</script>";
    }
  }
}

$id = $_GET['id'];
$query = $connect->query("SELECT * FROM anggota WHERE id='$id'");
$anggota = $query->fetch_assoc();

?>


<div class="container mt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Ubah Data Anggota</h4>
        </div>
        <div class="card-body">
          <a href="?page=anggota" class="btn btn-primary btn-sm mb-4"><i class="bi bi-arrow-left-short"></i> Kembali</a>
          <form action="" method="post">
            <input type="hidden" name="id" value="<?= $anggota['id']; ?>">
            <div class="mb-2">
              <label for="nik_ktp">Nik Ktp</label>
              <input type="text" name="nik_ktp" id="nik_ktp" class="form-control" required maxlength="16" value="<?= $anggota['nik_ktp']; ?>">
            </div>
            <div class="mb-2">
              <label for="nama_lengkap">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required value="<?= $anggota['nama_lengkap']; ?>">
            </div>
            <div class="mb-2">
              <label for="alamat">Alamat</label>
              <input type="text" name="alamat" id="alamat" class="form-control" required value="<?= $anggota['alamat']; ?>">
            </div>
            <div class="mb-2">
              <label for="no_hp">No Hp</label>
              <input type="text" name="no_hp" id="no_hp" class="form-control" required value="<?= $anggota['no_hp']; ?>">
            </div>
            <div class="mb-2">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required value="<?= $anggota['tanggal_lahir']; ?>">
            </div>
            <div>
              <label for="jk">Jenis Kelamin</label>
              <select name="jk" id="jk" class="form-control" required >
                <option value="">Pilih Jenis Kelamin</option>
                <option value="pria" <?php if($anggota['jk']== 'Pria') echo 'selected'; ?>>Pria</option>
                <option value="wanita" <?php if($anggota['jk']== 'Wanita') echo 'selected'; ?>>Wanita</option>
              </select>
            </div>
            </div>
              <label for="status">Status</label>
              <select name="status" id="status" class="form-control" required>
                <option value="">Pilih Status</option>
                <option value="menikah" <?php if($anggota['status']== 'Menikah') echo 'selected'; ?>>Menikah</option>
                <option value="Belum Menikah" <?php if($anggota['status']== 'Belum Menikah') echo 'selected'; ?>>Belum Menikah</option>
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