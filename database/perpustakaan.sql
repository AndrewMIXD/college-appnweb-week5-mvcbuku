CREATE DATABASE IF NOT EXISTS perpustakaan
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE perpustakaan;

CREATE TABLE IF NOT EXISTS buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(20) NOT NULL UNIQUE,
    judul VARCHAR(150) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    penerbit VARCHAR(100) NOT NULL,
    tahun_terbit INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO buku (isbn, judul, penulis, penerbit, tahun_terbit) VALUES
('9786020000011', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005),
('9786020000028', 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Hasta Mitra', 1980),
('9786020000035', 'Filosofi Teras', 'Henry Manampiring', 'Penerbit Buku Kompas', 2018);