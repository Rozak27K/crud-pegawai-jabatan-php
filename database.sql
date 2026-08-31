CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL
);

CREATE TABLE IF NOT EXISTS jabatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_jabatan VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS pegawai (
    id INT AUTO_INCREMENT PRIMARY KEY,
    foto VARCHAR(255) DEFAULT '',
    nama_pegawai VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    tgl_lahir DATE DEFAULT NULL,
    id_jabatan INT DEFAULT NULL,
    CONSTRAINT fk_pegawai_jabatan
        FOREIGN KEY (id_jabatan) REFERENCES jabatan(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

INSERT INTO user (username, password)
VALUES ('admin', MD5('admin'))
ON DUPLICATE KEY UPDATE username = username;

INSERT INTO jabatan (nama_jabatan)
VALUES ('Staff'), ('Manager'), ('Admin')
ON DUPLICATE KEY UPDATE nama_jabatan = VALUES(nama_jabatan);
