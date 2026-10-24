DROP DATABASE IF EXISTS sim_barang;
CREATE DATABASE sim_barang;
USE sim_barang;

-- Tabel users
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

-- Tabel kategori
CREATE TABLE kategori (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_kategori VARCHAR(50) NOT NULL
);

-- Tabel barang
CREATE TABLE barang (
  id INT AUTO_INCREMENT PRIMARY KEY,
  kode VARCHAR(20) NOT NULL UNIQUE,
  nama VARCHAR(100) NOT NULL,
  jumlah INT NOT NULL,
  kondisi VARCHAR(20) NOT NULL,
  harga INT NOT NULL,
  kategori_id INT NOT NULL,
  FOREIGN KEY (kategori_id) REFERENCES kategori(id)
);

-- Data awal
INSERT INTO users (username, password) VALUES
('admin', 'password123');

INSERT INTO kategori (nama_kategori) VALUES
('Elektronik'),
('Furnitur'),
('Alat Tulis');

INSERT INTO barang (kode, nama, jumlah, kondisi, harga, kategori_id) VALUES
('BRG-001', 'Proyektor', 5, 'Baik', 5000000, 1),
('BRG-002', 'Meja Lab', 20, 'Baik', 800000, 2),
('BRG-003', 'Komputer', 24, 'Baik', 7500000, 1),
('BRG-004', 'AC', 15, 'Baik', 4000000, 1),
('BRG-005', 'Kursi', 20, 'Baik', 350000, 2);