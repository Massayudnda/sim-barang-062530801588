<?php
session_start();

// Kalau belum login, lempar ke halaman login
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

// ===== Ambil data barang dari database =====
require_once "koneksi.php";

$stmt = $pdo->query(
    "SELECT b.kode, b.nama, k.nama_kategori, b.jumlah, b.kondisi
     FROM barang b
     JOIN kategori k ON b.kategori_id = k.id
     ORDER BY b.id"
);
$daftarBarang = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIM-Barang</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>SIM-Barang</h1>
    <p>Sistem Informasi Pengelolaan Inventaris Barang Jurusan</p>
  </header>

  <nav>
    <a href="#inventaris">Inventaris</a>
    <a href="#form-barang">Tambah Barang</a>
    <a href="logout.php">Logout (<?= htmlspecialchars($_SESSION["user"]) ?>)</a>
  </nav>

  <main>
    <section id="inventaris">
      <h2>Inventaris Barang</h2>
      <input type="text" id="cari" placeholder="Cari barang (kode, nama, kategori)...">
        <div class="tabel-wrap"></div>
      <table>
        <thead>
          <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
          </tr>
        </thead>
       <tbody>
        <?php foreach ($daftarBarang as $row): ?>
          <tr>
            <td><?= htmlspecialchars($row["kode"]) ?></td>
            <td><?= htmlspecialchars($row["nama"]) ?></td>
            <td><?= htmlspecialchars($row["nama_kategori"]) ?></td>
            <td><?= $row["jumlah"] ?></td>
            <td><?= htmlspecialchars($row["kondisi"]) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      </table>
      </div>
    </section>

    <section id="form-barang">
      <h2>Tambah Barang</h2>
      <form action="simpan.php" method="post">
        <div>
          <label for="kode">Kode Barang</label>
          <input type="text" id="kode" name="kode" placeholder="Contoh: BRG-001" required>
        </div>

        <div>
          <label for="nama">Nama Barang</label>
          <input type="text" id="nama" name="nama" placeholder="Contoh: Proyektor" required>
        </div>

        <div>
          <label for="kategori">Kategori</label>
          <select id="kategori" name="kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Furnitur">Furnitur</option>
            <option value="Alat Tulis">Alat Tulis</option>
          </select>
        </div>

        <div>
          <label for="jumlah">Jumlah</label>
          <input type="number" id="jumlah" name="jumlah" placeholder="Contoh: 5" required>
        </div>

        <div>
          <label for="kondisi">Kondisi</label>
          <select id="kondisi" name="kondisi" required>
            <option value="">-- Pilih Kondisi --</option>
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
          </select>
        </div>

        <div>
          <label for="harga">Harga Satuan (Rp)</label>
          <input type="number" id="harga" name="harga" placeholder="Contoh: 5000000" required>
        </div>

        <button type="submit">Simpan</button>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; 2026 Massayu Adinda Meilani - D3 Manajemen Informatika</p>
  </footer>
  <div id="toast">Data berhasil divalidasi!</div>
  <script src="main.js"></script>
</body>
</html>