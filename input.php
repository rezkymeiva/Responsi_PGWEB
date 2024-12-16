<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Klinik</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff; /* Light blue color */
            margin-bottom: 30px;
        }

        .btn-submit {
            width: 100%;
            background-color: #00b0ff; /* Light blue color */
            border: none;
            color: white;
            font-size: 16px;
            padding: 12px;
            border-radius: 5px;
        }

        .btn-submit:hover {
            background-color: #0099cc; /* Darker blue for hover effect */
        }

        .form-control:focus {
            border-color: #00b0ff; /* Light blue color for focus state */
        }

        .form-select:focus {
            border-color: #00b0ff; /* Light blue color for focus state */
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-container col-md-8 col-lg-6">
            <h2>Form Input Klinik</h2>

            <!-- Form input -->
            <form action="tabel_data.php" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No. HP:</label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="latitude" class="form-label">Latitude:</label>
                    <input type="number" step="any" id="latitude" name="latitude" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude:</label>
                    <input type="number" step="any" id="longitude" name="longitude" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="keluhan" class="form-label">Keluhan:</label>
                    <textarea id="keluhan" name="keluhan" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="puskesmas" class="form-label">Puskesmas:</label>
                    <select id="puskesmas" name="puskesmas" class="form-select" required>
                        <option value="">Pilih Puskesmas</option>
                        <option value="Puskesmas Kujangsari">Puskesmas Kujangsari</option>
                        <option value="Puskesmas Derwati">Puskesmas Derwati</option>
                        <option value="Puskesmas Pasawahan">Puskesmas Pasawahan</option>
                        <option value="Cempaka Arum">Cempaka Arum</option>
                        <option value="Puskesmas Mengger">Puskesmas Mengger</option>
                        <option value="Puskesmas Cibolerang">Puskesmas Cibolerang</option>
                        <option value="Puskesmas Sekejati">Puskesmas Sekejati</option>
                        <option value="Puskesmas Cijagra Lama">Puskesmas Cijagra Lama</option>
                        <option value="UPT Puskesmas Kopo">UPT Puskesmas Kopo</option>
                        <option value="Puskesmas Caringin">Puskesmas Caringin</option>
                        <option value="Puskesmas Cijagra Baru">Puskesmas Cijagra Baru</option>
                        <option value="Puskesmas Cibuntu">Puskesmas Cibuntu</option>
                        <option value="UPT Puskesmas Cipamokolan">UPT Puskesmas Cipamokolan</option>
                        <option value="Puskesmas Suryalaya">Puskesmas Suryalaya</option>
                        <option value="Puskesmas Cetarip">Puskesmas Cetarip</option>
                        <option value="UPT Puskesmas Cinambo">UPT Puskesmas Cinambo</option>
                        <option value="Puskesmas Pelindung Hewan">Puskesmas Pelindung Hewan</option>
                        <option value="Puskesmas Panyileukan">Puskesmas Panyileukan</option>
                        <option value="Puskesmas M. Ramdhan">Puskesmas M. Ramdhan</option>
                        <option value="Puskesmas Cigondewah">Puskesmas Cigondewah</option>
                        <option value="Puskesmas Lio Genteng">Puskesmas Lio Genteng</option>
                        <option value="Puskesmas Gumuruh">Puskesmas Gumuruh</option>
                        <option value="Puskesmas Cibiru">Puskesmas Cibiru</option>
                        <option value="Puskesmas Talaga Bodas">Puskesmas Talaga Bodas</option>
                        <option value="Puskesmas Rusunawa">Puskesmas Rusunawa</option>
                        <option value="Puskesmas Jajawai">Puskesmas Jajawai</option>
                        <option value="UPT Puskesmas Pasundan">UPT Puskesmas Pasundan</option>
                        <option value="Puskesmas Astana Anyar">Puskesmas Astana Anyar</option>
                        <option value="Puskesmas Panghegar">Puskesmas Panghegar</option>
                        <option value="Puskesmas Sukapakir">Puskesmas Sukapakir</option>
                        <option value="UPT Puskesmas Pagarsih">UPT Puskesmas Pagarsih</option>
                    </select>
                </div>

                <!-- Hidden input field for new entries -->
                <input type="hidden" id="no_urut" name="no_urut" value="0">

                <button type="submit" name="submit" class="btn btn-submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
