<?php
class Database
{
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "db_php";
    public $connect;

    // Constructor untuk menghubungkan ke database
    function __construct()
    {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        if (mysqli_connect_errno()) {
            die("Koneksi gagal : " . mysqli_connect_error()); // Menggunakan mysqli_connect_error()
        }
    }

    // Fungsi untuk menampilkan semua data dari tb_users
    function tampilData()
    {
        $data = mysqli_query($this->connect, "SELECT * FROM tb_users");
        if (!$data) {
            die("Query Error: " . mysqli_error($this->connect)); // Menangkap error query
        }
        $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
        return $rows;
    }

    // Fungsi untuk menambah data baru ke tb_users
    function tambahData($nama, $alamat, $nohp, $jenis_kelamin, $email, $foto)
    {
        $query = "INSERT INTO tb_users (nama, alamat, nohp, jenis_kelamin, email, foto) 
                  VALUES ('$nama', '$alamat', '$nohp', '$jenis_kelamin', '$email', '$foto')";

        if (!mysqli_query($this->connect, $query)) {
            die("Query Error: " . mysqli_error($this->connect)); // Menangkap error query
        }
    }

    // Fungsi untuk mengambil data berdasarkan ID untuk edit
    function editData($id)
    {
        $data = mysqli_query($this->connect, "SELECT * FROM tb_users WHERE id='$id'");
        if (!$data) {
            die("Query Error: " . mysqli_error($this->connect)); // Menangkap error query
        }
        $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
        return $rows;
    }

    // Fungsi untuk memperbarui data di tb_users
    function updateData($id, $nama, $alamat, $nohp, $jenis_kelamin, $email, $foto)
    {
        $query = "UPDATE tb_users SET nama = '$nama', alamat = '$alamat', nohp = '$nohp', jenis_kelamin = '$jenis_kelamin', email = '$email', foto = '$foto' WHERE id = '$id'";

        if (!mysqli_query($this->connect, $query)) {
            die("Query Error: " . mysqli_error($this->connect)); // Menangkap error query
        }
    }

    // Fungsi untuk memperbarui data tanpa mengganti foto
    function updateDataWithoutFoto($id, $nama, $alamat, $nohp, $jenis_kelamin, $email)
    {
        $query = "UPDATE tb_users SET nama = '$nama', alamat = '$alamat', nohp = '$nohp', jenis_kelamin = '$jenis_kelamin', email = '$email' WHERE id = '$id'";

        if (!mysqli_query($this->connect, $query)) {
            die("Query Error: " . mysqli_error($this->connect)); // Menangkap error query
        }
    }

    // Fungsi untuk menghapus data dari tb_users
    function hapusData($id)
    {
        // Persiapkan query DELETE
        $query = "DELETE FROM tb_users WHERE id = ?";

        // Siapkan prepared statement
        $stmt = mysqli_prepare($this->connect, $query);

        if ($stmt === false) {
            die("Error preparing statement: " . mysqli_error($this->connect));
        }

        // Ikat parameter
        mysqli_stmt_bind_param($stmt, 'i', $id); // 'i' untuk integer

        // Eksekusi statement
        if (!mysqli_stmt_execute($stmt)) {
            die("Query Error: " . mysqli_stmt_error($stmt));
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    }

    // Fungsi untuk menampilkan data berdasarkan ID (untuk detail)
    public function tampilDataById($id)
    {
        $query = "SELECT * FROM tb_users WHERE id = $id";
        $result = mysqli_query($this->connect, $query);
        if (!$result) {
            die("Query Error: " . mysqli_error($this->connect)); // Menangkap error query
        }
        return mysqli_fetch_assoc($result);
    }
}
