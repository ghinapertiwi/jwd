
CREATE TABLE tb_admin (
    id_admin int,
    nama varchar(50),
    no_hp varchar(13),
    username varchar(20),
    password varchar(20),
    PRIMARY KEY (id_admin)
);

CREATE TABLE tb_pemesan (
    id_pemesan int,
    no_hp varchar(13),
    nama varchar(50),
    PRIMARY KEY (id_pemesan)
);

CREATE TABLE tb_pemesanan_undangan_pernikahan (
    id_pemesanan int,
    id_pemesan int,
    tgl_pemesanan date,
    nama_pengantin_putra varchar(50),
    nama_orangtua_pengantin_putra varchar(50),
    nama_pengantin_putri varchar(50),
    nama_orangtua_pengantin_putri varchar(50),
    alamat_resepsi varchar(255),
    waktu_resepsi time,
    tanggal_resepsi date,
    status ENUM ('pemesanan', 'proses','cetak','selesai')DEFAULT 'pemesanan',
    PRIMARY KEY (id_pemesanan),
    FOREIGN KEY (id_pemesan) REFERENCES tb_pemesan(id_pemesan)
);
