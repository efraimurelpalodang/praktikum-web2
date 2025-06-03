<div class="container mt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Anggota</h4>
        </div>
        <div class="card-body">
          <a href="?page=anggotaadd" class="btn btn-primary btn-sm mb-4"><i class="bi bi-plus-circle"></i> Tambah Data</a>
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no = 1;
                $query = $connect->query("SELECT * FROM anggota");
                while($row = $query->fetch_assoc()) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row["nik_ktp"]; ?></td>
                <td><?= $row["nama_lengkap"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td><?= $row["no_hp"]; ?></td>
                <td><?= $row["tanggal_lahir"]; ?></td>
                <td><?= $row["jk"]; ?></td>
                <td><?= $row["status"]; ?></td>
                <td>
                  <a href="?page=anggotaedit&id=<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                  <a href="?page=anggotadelete&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i> Hapus</a>
                </td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>