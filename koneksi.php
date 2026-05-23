<?php
// koneksi.php
// Berkas ini mengatur jembatan komunikasi dan mengizinkan akses (CORS) dari peninjau Canvas
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$username = "root";
$password = "";
$database = "tanam_pantau";

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
    echo json_encode(["success" => false, "message" => "Koneksi ke MySQL gagal: " . $koneksi->connect_error]);
    exit();
}
?>