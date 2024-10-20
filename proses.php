<?php
include 'database.php';
$db = new Database();

// membuat variable aksi, digunakan untuk menangkap aktifitas yang dilakukan oleh user
$aksi = $_GET['aksi'];

if ($aksi == "tambah") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];

    // Proses upload foto
    $foto = $_FILES['foto']['name']; // Nama file foto
    $tmp_foto = $_FILES['foto']['tmp_name']; // Lokasi sementara file diupload
    $target_dir = "uploads/"; // Direktori penyimpanan foto

    // Cek apakah file diupload atau tidak
    if ($foto != "") {
        // Pindahkan file ke folder uploads
        if (move_uploaded_file($tmp_foto, $target_dir . $foto)) {
            // Tambah data ke database jika foto berhasil diunggah
            $db->tambahData($nama, $alamat, $nohp, $jenis_kelamin, $email, $foto);
            echo "Data berhasil ditambahkan!";
        } else {
            echo "Upload foto gagal!";
        }
    } else {
        echo "Tidak ada file foto yang diunggah!";
    }

    // mengarahkan tampilan ke index
    header("location:index.php");
} elseif ($aksi == "update") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];

    // Proses upload foto
    $foto = $_FILES['foto']['name']; // Nama file foto
    $tmp_foto = $_FILES['foto']['tmp_name']; // Lokasi sementara file diupload
    $target_dir = "uploads/"; // Direktori penyimpanan foto

    // Jika foto baru diunggah
    if ($foto != "") {
        // Pindahkan file ke folder uploads
        if (move_uploaded_file($tmp_foto, $target_dir . $foto)) {
            // Update data ke database jika foto berhasil diunggah
            $db->updateData($id, $nama, $alamat, $nohp, $jenis_kelamin, $email, $foto);
            echo "Data berhasil diupdate!";
        } else {
            echo "Upload foto gagal!";
        }
    } else {
        // Jika tidak ada foto baru, hanya update data tanpa mengganti foto
        $db->updateDataWithoutFoto($id, $nama, $alamat, $nohp, $jenis_kelamin, $email);
        echo "Data berhasil diupdate tanpa mengubah foto!";
    }

    // mengarahkan tampilan ke index
    header("location:index.php");
} elseif ($aksi == "hapus") {
    $db->hapusData($_GET['id']);
    header("location:index.php");
}
