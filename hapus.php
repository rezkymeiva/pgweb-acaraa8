<?php
// Cek apakah parameter id ada
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Sesuaikan dengan setting MySQL
    $servername = "localhost";
    $username = "root";
    $password = ""; // Sesuaikan jika ada password
    $dbname = "pgweb8"; // Pastikan nama database sesuai

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk menghapus data berdasarkan id
    $stmt = $conn->prepare("DELETE FROM penduduk WHERE id = ?");
    $stmt->bind_param("i", $id); // i = integer

    if ($stmt->execute()) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup koneksi dan statement
    $stmt->close();
    $conn->close();

    // Redirect kembali ke halaman index1.php setelah 2 detik
    header("Refresh: 2; URL=index1.php");
    exit;
} else {
    echo "ID tidak ditemukan.";
}
?>
