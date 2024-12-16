<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = ""; // Ubah sesuai pengaturan
$dbname = "responsi"; // Nama database

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah id sudah ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data berdasarkan id
    $sql = "SELECT * FROM klinik WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Data tidak ditemukan!");
    }
}

// Update data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $keluhan = $_POST['keluhan'];
    $no_urut = $_POST['no_urut'];

    // Query untuk update data
    $update_sql = "UPDATE klinik SET nama = ?, alamat = ?, email = ?, no_hp = ?, latitude = ?, longitude = ?, keluhan = ?, no_urut = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssssddssi", $nama, $alamat, $email, $no_hp, $latitude, $longitude, $keluhan, $no_urut, $id);

    if ($update_stmt->execute()) {
        // Redirect ke tabel data setelah update
        header("Location: tabel_data.php");
        exit();
    } else {
        echo "<p style='color:red;'>Error: " . $update_stmt->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Klinik</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 30px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            color: #6a82fb;
            text-align: center;
        }

        .form-container label {
            font-weight: bold;
        }

        .btn-update {
            background-color: #00bfae; /* Set the color to match your previous button */
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 25px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-update:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            background-color: #138496;
        }

        .btn-back {
            background-color: #6c757d; /* Neutral grey color for the back button */
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 25px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-back:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            background-color: #5a6268;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-container">
            <h2>Edit Data Klinik</h2>

            <form action="edit.php?id=<?php echo $id; ?>" method="post">

                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="no_hp">No. HP:</label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?php echo $row['no_hp']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="latitude">Latitude:</label>
                    <input type="number" step="any" id="latitude" name="latitude" class="form-control" value="<?php echo $row['latitude']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="longitude">Longitude:</label>
                    <input type="number" step="any" id="longitude" name="longitude" class="form-control" value="<?php echo $row['longitude']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="keluhan">Keluhan:</label>
                    <textarea id="keluhan" name="keluhan" class="form-control" required><?php echo $row['keluhan']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="no_urut">No. Urut Periksa:</label>
                    <input type="number" id="no_urut" name="no_urut" class="form-control" value="<?php echo $row['no_urut']; ?>">
                </div>

                <div class="form-group text-center">
                    <input type="submit" value="Update" class="btn-update">
                </div>

            </form>

            <div class="text-center mt-3">
                <a href="tabel_data.php" class="btn-back">Kembali ke Daftar Tabel</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
