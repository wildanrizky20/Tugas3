<?php
include 'database.php';
$db = new Database();

// Menguji fungsi edit untuk melihat data berdasarkan id
$detail = $db->editData($_GET['id']);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        .form-label {
            font-weight: 500;
            color: #2c3e50;
        }

        .form-control:focus {
            border-color: #764ba2;
            box-shadow: 0 0 0 0.2rem rgba(118, 75, 162, 0.25);
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 0.8rem 2rem;
            font-weight: 500;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .preview-image {
            max-width: 200px;
            display: block;
            margin-top: 10px;
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
            <a href="index.php" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </nav>

    <!-- Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="display-4">Edit Data</h1>
            <p class="lead">Silakan edit data pada form di bawah ini</p>
        </div>
    </div>

    <div class="container">
        <div class="form-container">
            <form method="POST" action="proses.php?aksi=update" enctype="multipart/form-data" class="needs-validation" novalidate>
                <?php
                foreach ($detail as $dataUser) {
                ?>
                    <input type="hidden" name="id" value="<?php echo $dataUser['id'] ?>">

                    <div class="mb-3">
                        <label for="nama" class="form-label">
                            <i class="fas fa-user me-2"></i>Nama
                        </label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $dataUser['nama'] ?>" required>
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">
                            <i class="fas fa-map-marker-alt me-2"></i>Alamat
                        </label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $dataUser['alamat'] ?></textarea>
                        <div class="invalid-feedback">
                            Alamat tidak boleh kosong
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nohp" class="form-label">
                                <i class="fas fa-phone me-2"></i>No HP
                            </label>
                            <input type="tel" class="form-control" id="nohp" name="nohp" value="<?php echo $dataUser['nohp'] ?>" required>
                            <div class="invalid-feedback">
                                No HP tidak boleh kosong
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin" class="form-label">
                                <i class="fas fa-venus-mars me-2"></i>Jenis Kelamin
                            </label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki" <?php echo ($dataUser['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?php echo ($dataUser['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                Pilih jenis kelamin
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope me-2"></i>Email
                        </label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $dataUser['email'] ?>" required>
                        <div class="invalid-feedback">
                            Masukkan email yang valid
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="foto" class="form-label">
                            <i class="fas fa-image me-2"></i>Foto
                        </label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        <?php if (!empty($dataUser['foto'])) { ?>
                            <img src="uploads/<?php echo $dataUser['foto']; ?>" class="preview-image rounded mt-2" width="100">
                            <p>Foto saat ini:</p>
                        <?php } ?>
                        <div class="invalid-feedback">
                            Masukkan foto
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-outline-secondary me-2">
                        <i class="fas fa-undo me-2"></i>Reset
                    </button>
                    <button type="submit" class="btn btn-submit text-white">
                        <i class="fas fa-save me-2"></i>Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>