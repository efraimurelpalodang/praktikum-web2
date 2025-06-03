<div class="container mt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Pengguna</h4>
        </div>
        <div class="card-body">
          <a href="?page=penggunaadd" class="btn btn-primary btn-sm mb-4"><i class="bi bi-plus-circle"></i> Tambah Data</a>
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>role</th>
                <th>Login Terakhir</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no = 1;
                $query = $connect->query("SELECT * FROM pengguna");
                while($row = $query->fetch_assoc()) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row["username"]; ?></td>
                <td><?= $row["role"]; ?></td>
                <td><?= $row["login_terakhir"]; ?></td>
                <td>
                  <a href="?page=penggunaedit&id=<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                  <a href="?page=penggunadelete&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i> Hapus</a>
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