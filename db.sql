CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    user_type ENUM('penyedia_kost', 'pencari_kost')
);

CREATE TABLE kosts (
    kost_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    nama_kost VARCHAR(255),
    lokasi VARCHAR(255),
    jumlah_kamar INT,
    fasilitas VARCHAR(255),
    harga_per_bulan DECIMAL(10, 2),
    deskripsi TEXT,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE booking_status (
    booking_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    kost_id INT,
    booking_status ENUM('pending', 'confirmed', 'canceled', 'completed'),
    tanggal_booking DATE,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (kost_id) REFERENCES kosts(kost_id)
);
INSERT INTO kosts (nama_kost, lokasi, jumlah_kamar, fasilitas, harga_per_bulan, deskripsi)
VALUES ('Kost A', 'Jakarta', 10, 'WiFi, AC', 1000000, 'Kost nyaman di pusat kota Jakarta'),
       ('Kost B', 'Bandung', 8, 'WiFi', 800000, 'Kost strategis dekat kampus'),
       ('Kost C', 'Surabaya', 12, 'AC', 1200000, 'Kost modern dengan fasilitas lengkap');

INSERT INTO users (username, email, password, user_type)
VALUES ('penyedia1', 'penyedia1@example.com', 'password1', 'penyedia_kost'),
       ('pencari1', 'pencari1@example.com', 'password2', 'pencari_kost');

INSERT INTO kosts (user_id, nama_kost, lokasi, jumlah_kamar, fasilitas, harga_per_bulan, deskripsi)
VALUES (1, 'Kost A', 'Jakarta', 10, 'WiFi, AC', 1000000, 'Kost nyaman di pusat kota Jakarta'),
       (1, 'Kost B', 'Bandung', 8, 'WiFi', 800000, 'Kost strategis dekat kampus'),
       (2, 'Kost C', 'Surabaya', 12, 'AC', 1200000, 'Kost modern dengan fasilitas lengkap');

INSERT INTO booking_status (user_id, kost_id, booking_status, tanggal_booking)
VALUES (2, 1, 'pending', '2024-03-15'),
       (1, 2, 'confirmed', '2024-03-16'),
       (2, 3, 'pending', '2024-03-17');
