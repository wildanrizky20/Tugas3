<?php
include 'database.php';
$db = new Database;

$id = $_GET['id'];
$dataUser = $db->tampilDataById($id);

if ($dataUser) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pengguna - <?php echo htmlspecialchars($dataUser['nama']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        .profile-card {
            background: white;
            border-radius: 0px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 2rem;
            margin: 20px 0;
            padding: 20px;
        }

        .profile-image-container {
            position: relative;
            width: 200px;
            height: 300px;
            overflow: hidden;
            background: #f8f9fa;
            object-fit: cover;
            margin: 0 auto;
            display: block;
        }

        .profile-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-info {
            padding: 2rem;
        }

        .info-item {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #666;
            width: 140px;
            font-weight: 500;
        }

        .info-value {
            color: #333;
            flex-grow: 1;
        }

        .btn-back {
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            transform: translateX(-5px);
        }

        .icon-circle {
            width: 35px;
            height: 35px;
            background: #f8f9fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: #764ba2;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-database me-2"></i>OOP PHP CRUD
            </a>
        </div>
    </nav>

    <!-- Header -->
    <div class="page-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="display-4">Detail Pengguna</h1>
                    <p class="lead mb-0">Informasi lengkap tentang pengguna</p>
                </div>
                <a href="index.php" class="btn btn-light btn-back">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="profile-card">
                    <div class="profile-image-container">
                        <img src="uploads/<?php echo htmlspecialchars($dataUser['foto']); ?>" 
                             class="profile-image" 
                             alt="Foto <?php echo htmlspecialchars($dataUser['nama']); ?>">
                    </div>
                    
                    <div class="profile-info">
                        <h2 class="text-center mb-4"><?php echo htmlspecialchars($dataUser['nama']); ?></h2>
                        
                        <div class="info-item">
                            <div class="icon-circle">
                                <i class="fas fa-venus-mars"></i>
                            </div>
                            <span class="info-label">Jenis Kelamin</span>
                            <span class="info-value"><?php echo htmlspecialchars($dataUser['jenis_kelamin']); ?></span>
                        </div>

                        <div class="info-item">
                            <div class="icon-circle">
                                <i class="fas fa-phone"></i>
                            </div>
                            <span class="info-label">Nomor HP</span>
                            <span class="info-value"><?php echo htmlspecialchars($dataUser['nohp']); ?></span>
                        </div>

                        <div class="info-item">
                            <div class="icon-circle">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span class="info-label">Email</span>
                            <span class="info-value"><?php echo htmlspecialchars($dataUser['email']); ?></span>
                        </div>

                        <div class="info-item">
                            <div class="icon-circle">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span class="info-label">Alamat</span>
                            <span class="info-value"><?php echo htmlspecialchars($dataUser['alamat']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
} else {
    ?>
    <div class="container mt-5">
        <div class="alert alert-danger text-center" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            Pengguna tidak ditemukan.
            <div class="mt-3">
                <a href="index.php" class="btn btn-danger">Kembali ke Halaman Utama</a>
            </div>
        </div>
    </div>
    <?php
}
?>