<?php
// get_plants.php
require_once 'koneksi.php';

$sql = "SELECT * FROM tb_tanaman";
$result = $koneksi->query($sql);

$plants = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $plants[] = [
            "id" => (int)$row['id'],
            "name" => $row['name'],
            "type" => $row['type'],
            "health" => (float)$row['health'],
            "color" => $row['color']
        ];
    }
}

// Mengembalikan data tanaman dalam bentuk JSON
echo json_encode($plants);
?>