<?php
include 'database.php';
$db = new Database;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .navbar-brand {
            font-weight: 600;
            color: #2c3e50;
        }
        .card {
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            border: none;
        }
        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }
        .btn-action {
            transition: all 0.3s;
        }
        .btn-action:hover {
            transform: translateY(-2px);
        }
        .page-header {
            padding: 2rem 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            margin-bottom: 2rem;
        }
    </style>
</head>

<body class="bg-light">
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
            <h1 class="display-4">Sistem Pengelolaan Data Pengguna</h1>
            <p class="lead">Data management system</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title mb-0">Daftar Pengguna</h5>
                    <a href="input.php" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Data
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No HP</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            foreach ($db->tampilData() as $dataUser) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $nomor++; ?></th>
                                    <td><?php echo htmlspecialchars($dataUser['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($dataUser['alamat']); ?></td>
                                    <td><?php echo htmlspecialchars($dataUser['nohp']); ?></td>
                                    <td class="text-center">
                                        <a href="detail.php?id=<?php echo $dataUser['id'] ?>" class="btn btn-info btn-sm btn-action me-1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="edit.php?id=<?php echo $dataUser['id'] ?>" class="btn btn-warning btn-sm btn-action me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="proses.php?id=<?php echo $dataUser['id'] ?>&aksi=hapus" 
                                           class="btn btn-danger btn-sm btn-action"
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
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

    <!-- Footer -->
    <footer class="bg-white mt-5 py-3 text-center">
        <div class="container">
            <p class="text-muted mb-0">&copy; <?php echo date('Y'); ?> created by Wildan Rizky Ramadhan, 23.230.0064</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>