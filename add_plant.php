<?php
// add_plant.php
require_once 'koneksi.php';

// Membaca data JSON dari body request javascript fetch()
$input = json_decode(file_get_contents("php://input"), true);

if (isset($input['name']) && isset($input['type'])) {
    $name = $koneksi->real_escape_string($input['name']);
    $type = $koneksi->real_escape_string($input['type']);
    
    // Memberikan warna background Tailwind secara acak untuk kartu tanaman baru
    $colors = ['bg-emerald-500', 'bg-blue-500', 'bg-orange-500', 'bg-purple-500', 'bg-rose-500'];
    $randomColor = $colors[array_rand($colors)];

    $sql = "INSERT INTO tb_tanaman (name, type, health, color) VALUES ('$name', '$type', 100.0, '$randomColor')";

    if ($koneksi->query($sql) === TRUE) {
        echo json_encode(["success" => true, "message" => "Tanaman berhasil disimpan ke MySQL."]);
    } else {
        echo json_encode(["success" => false, "message" => "Gagal menyimpan ke MySQL: " . $koneksi->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Data masukan tidak lengkap."]);
}
?>