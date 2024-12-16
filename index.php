<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAP BANDUNG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        /* Navbar sticky */
        .nav {
            position: sticky;
            top: 0;
            background-color: #ffffff;
            padding: 15px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .nav a {
            color: #007bff;
            text-decoration: none;
            margin: 0 20px;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .nav a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Align navbar links to the center */
        .nav {
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .nav a {
            padding: 8px 15px;
        }

        /* Carousel */
        .carousel-item img {
            width: 100%;
            height: 200px;
            /* Adjusted height */
            object-fit: cover;
        }

        .carousel-caption h1 {
            font-size: 4rem;
            /* Increased font size */
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            color: rgba(231, 231, 235, 0.94);
            /* Set text color to black */
        }

        .carousel-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Transparansi hitam */
            z-index: 1;
        }

        .carousel-caption {
            position: absolute;
            /* Tetap di atas gambar */
            bottom: 20px;
            /* Sesuaikan jarak dari bawah */
            left: 50%;
            transform: translateX(-50%);
            /* Posisi teks di tengah */
            color: white;
            /* Warna teks */
            z-index: 2;
            /* Di atas layer transparan */
            padding: 0;
            /* Hilangkan padding ekstra */
            margin: 0;
            /* Hilangkan margin ekstra */
            width: auto;
            /* Tidak perlu full width */
        }

        .carousel-item img {
            display: block;
            /* Pastikan gambar tidak memiliki ruang ekstra */
            width: 100%;
            height: 250px;
            /* Gambar responsif */
        }

        .carousel {
            overflow: hidden;
            /* Pastikan tidak ada elemen berlebih */
        }

        /* Card Style */
        .card {
            background-color: white;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h2 {
            font-size: 1.5rem;
            color: #1e90ff;
            font-weight: 600;
        }

        .card-content p {
            font-size: 0,95rem;
            color: #555;
            margin-bottom: 15px;
        }

        .card-content a {
            text-decoration: none;
            color: white;
            background-color: #1e90ff;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .card-content a:hover {
            background-color: #007bff;
        }

        /* Table */
        table {
            width: 100%;
            margin: 30px 0;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 1rem;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover td {
            background-color: #e6f7ff;
        }

        tr:hover {
            transform: translateY(-2px);
        }

        .table-striped tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-striped th,
        .table-striped td {
            border: 1px solid #ddd;
        }

        /* Footer */
        .footer {
            background-color: #1e90ff;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }

        /* Contact Section */
        .contact-info {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .contact-info h2 {
            font-size: 2rem;
            color: #007bff;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .contact-info p {
            font-size: 1rem;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <!-- Header with Carousel Section -->
    <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="icon/bkg1.jpg" class="d-block w-100" alt="Image 1">
                <div class="carousel-caption d-none d-md-block">
                    <h1>SIAP BANDUNG</h1>
                    <p>Sistem Informasi Akses Pelayanan Kota Bandung</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="icon/bkg2.jpeg" class="d-block w-100" alt="Image 2">
                <div class="carousel-caption d-none d-md-block">
                    <h1>SIAP BANDUNG</h1>
                    <p>Sistem Informasi Akses Pelayanan Kota Bandung</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="icon/bkg3.jpeg" class="d-block w-100" alt="Image 3">
                <div class="carousel-caption d-none d-md-block">
                    <h1>SIAP BANDUNG</h1>
                    <p>Sistem Informasi Akses Pelayanan Kota Bandung</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Navigation Section -->
    <div class="nav">
        <a href="#">Beranda</a>
        <a href="#data-puskesmas">Data Puskesmas</a>
        <a href="#data-rumah-sakit">Data Rumah Sakit</a>
        <a href="#kontak-kami">Kontak Kami</a>
    </div>

    <!-- Content Section -->
    <div class="container my-5">
        <div class="row g-4 justify-content-center">
            <!-- Puskesmas Card -->
            <div class="col-md-4">
                <div class="card">
                    <img src="icon/puskesmas.png" alt="Gambar Puskesmas">
                    <div class="card-content">
                        <h2>Puskesmas</h2>
                        <p>Dapatkan informasi lengkap mengenai Puskesmas di Kota Bandung, mulai dari lokasi, kecamatan, desa, hingga detail koordinat untuk mempermudah akses layanan kesehatan di daerah Anda.</p>
                        <a href="puske.php#data-puskesmas">Kunjungi Halaman →</a>
                    </div>
                </div>
            </div>

            <!-- Rumah Sakit Card -->
            <div class="col-md-4">
                <div class="card">
                    <img src="icon/rs.jpg" alt="Gambar Rumah Sakit">
                    <div class="card-content">
                        <h2>Rumah Sakit</h2>
                        <p>Telusuri data terkini Rumah Sakit di Kota Bandung, termasuk nama, kepala rumah sakit, alamat lengkap, dan nomor telepon untuk memudahkan Anda mendapatkan layanan medis.</p>
                        <a href="index2.php">Kunjungi Halaman →</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Table Section -->
        <div id="data-puskesmas" class="mt-5">
            <h2 class="text-center mb-4">Data Puskesmas Kota Bandung</h2>
            <!-- PHP Table Logic -->
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "responsi";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM puskesmas";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>Nama Puskesmas</th>
                                <th>Kecamatan</th>
                                <th>Desa</th>
                                <th>Kode</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nama']}</td>
                            <td>{$row['kecamatan']}</td>
                            <td>{$row['desa']}</td>
                            <td>{$row['kode']}</td>
                            <td>{$row['latitude']}</td>
                            <td>{$row['longitude']}</td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No data found for Puskesmas</p>";
            }
            ?>
        </div>

        <div id="data-rumah-sakit" class="mt-5">
            <h2 class="text-center mb-4">Data Rumah Sakit Kota Bandung</h2>
            <!-- PHP Table Logic -->
            <?php
            $sql_rs = "SELECT * FROM rumah_sakit_bandung";
            $result_rs = $conn->query($sql_rs);

            if ($result_rs->num_rows > 0) {
                echo "<table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>Nama Rumah Sakit</th>
                                <th>Kecamatan</th>
                                <th>Desa</th>
                                <th>Kode</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = $result_rs->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nama']}</td>
                            <td>{$row['kecamatan']}</td>
                            <td>{$row['desa']}</td>
                            <td>{$row['kode']}</td>
                            <td>{$row['latitude']}</td>
                            <td>{$row['longitude']}</td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No data found for Rumah Sakit</p>";
            }

            $conn->close();
            ?>
        </div>

        <!-- Contact Section -->
        <div id="kontak-kami" class="mt-5">
            <h2 class="text-center mb-4">Kontak Kami</h2>
            <div class="contact-info">
                <p><strong>Dinas Kesehatan Kota Bandung</strong></p>
                <p>Jl. Supratman No. 73, Cihapit, Bandung Wetan, Kota Bandung</p>
                <p>Email: <a href="mailto:dinaskesehatankotabdg@gmail.com">dinaskesehatankotabdg@gmail.com</a></p>
            </div>
        </div>

    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>© 2024 SIAP BANDUNG - Sistem Informasi dan Data Kesehatan Kota Bandung</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>