<?php
// Ambil input dari request
$data = json_decode(file_get_contents("php://input"), true);

// Lokasi file token
$filePath = 'valid_tokens.json';

// Muat token dari file
$tokens = json_decode(file_get_contents($filePath), true);

// Update usage count berdasarkan input
foreach ($tokens as &$token) {
    foreach ($data as $update) {
        if ($token['token'] === $update['token']) {
            $token['usageCount'] = $update['usageCount'];
        }
    }
}

// Simpan perubahan ke file
file_put_contents($filePath, json_encode($tokens));

// Respon sukses
echo json_encode(["status" => "success"]);
?>
