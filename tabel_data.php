<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses data dari form input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $keluhan = $_POST['keluhan'];
    $puskesmas = $_POST['puskesmas'];
    $no_urut = $_POST['no_urut']; // Default value

    // Query untuk memasukkan data
    $sql_insert = "INSERT INTO klinik (nama, alamat, email, no_hp, latitude, longitude, keluhan, puskesmas, no_urut) 
                   VALUES ('$nama', '$alamat', '$email', '$no_hp', '$latitude', '$longitude', '$keluhan', '$puskesmas', '$no_urut')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>alert('Data berhasil disimpan');</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data: " . $conn->error . "');</script>";
    }
}

// Proses hapus data jika parameter 'hapus' ada
if (isset($_GET['hapus'])) {
    $id_hapus = $conn->real_escape_string($_GET['hapus']);
    $sql_hapus = "DELETE FROM klinik WHERE id = '$id_hapus'";

    if ($conn->query($sql_hapus) === TRUE) {
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . $conn->error . "');</script>";
    }
}

// Query dasar untuk menampilkan data
$sql = "SELECT * FROM klinik";

// Filter pencarian jika ada input
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql .= " WHERE puskesmas LIKE '%$search%' OR nama LIKE '%$search%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data Klinik</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 30px;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .btn-custom {
            padding: 6px 18px;
            font-size: 12px;
            border-radius: 25px;
            transition: all 0.3s ease-in-out;
            text-transform: uppercase;
        }

        .btn-edit {
            background-color: #4f8cff;
            color: white;
            border: none;
        }

        .btn-edit:hover {
            background-color: #3584e3;
        }

        .btn-delete {
            background-color: #f54242;
            color: white;
            border: none;
        }

        .btn-delete:hover {
            background-color: #e02e2e;
        }

        .btn-back, .btn-search {
            background-color: #00bfae;
            color: white;
            border: none;
        }

        .btn-back:hover, .btn-search:hover {
            background-color: #00a68a;
        }

        .search-form {
            margin-bottom: 20px;
        }

        .table-container {
            margin-top: 20px;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table-container a {
            text-decoration: none;
        }

        .action-btns a {
            margin: 0 5px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table-container .btn-custom {
            padding: 6px 16px;
            font-size: 12px;
            border-radius: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center text-primary">Tabel Data Pendaftaran</h2>

        <!-- Formulir Pencarian -->
        <div class="search-form">
            <form method="GET" action="">
                <div class="input-group">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Cari Nama Puskesmas atau Rumah Sakit..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button type="submit" class="btn btn-search btn-custom">Cari</button>
                </div>
            </form>
        </div>

        <!-- Tombol kembali ke daftar tabel -->
        <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
            <div class="mt-3">
                <form method="GET" action="">
                    <button type="submit" class="btn btn-back btn-custom">Kembali ke Daftar Tabel</button>
                </form>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Keluhan</th>
                        <th>No. Urut</th>
                        <th>Puskesmas</th>
                        <th>Aksi</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td>" . $row["alamat"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["no_hp"] . "</td>";
                            echo "<td>" . $row["latitude"] . "</td>";
                            echo "<td>" . $row["longitude"] . "</td>";
                            echo "<td>" . $row["keluhan"] . "</td>";
                            echo "<td>" . $row["no_urut"] . "</td>";
                            echo "<td>" . $row["puskesmas"] . "</td>";
                            echo "<td>
                                    <a href='edit.php?id=" . $row["id"] . "' class='btn btn-edit btn-custom'>Edit</a>
                                  </td>";
                            echo "<td>
                                    <a href='tabel_data.php?hapus=" . $row["id"] . "' class='btn btn-delete btn-custom' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12' class='text-center'>Tidak ada data</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-center">
            <a href="input.php" class="btn btn-back btn-custom">Kembali ke Form</a>
        </div>

        <br>
        <div class="text-center">
            <a href="puske.php">
                <button class="btn btn-back btn-custom">Kembali ke Peta</button>
            </a>
            <a href="index.php">
                <button class="btn btn-back btn-custom">Kembali ke Beranda</button>
            </a>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
