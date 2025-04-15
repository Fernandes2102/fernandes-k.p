<?php
include 'pemilu2.php';

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$calon = $_POST['calon'];

$cek = $conn->query("SELECT * FROM pemilih WHERE nik = '$nik'");
if ($cek->num_rows > 0) {
    $row = $cek->fetch_assoc();
    if ($row['sudah_memilih']) {
        echo "Anda sudah memilih!";
        exit;
    } else {
        $id = $row['id'];
    }
} else {
    $conn->query("INSERT INTO pemilih (nik, nama) VALUES ('$nik', '$nama')");
    $id = $conn->insert_id;
}

$conn->query("INSERT INTO suara (id_pemilih, calon) VALUES ($id, '$calon')");
$conn->query("UPDATE pemilih SET sudah_memilih = 1 WHERE id = $id");

echo "Terima kasih telah memilih!";
?>
