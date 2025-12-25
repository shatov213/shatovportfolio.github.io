<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    if ($data && isset($data['projects'])) {
        $jsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('data.json', $jsonData);
        echo json_encode(['success' => true, 'message' => 'Данные сохранены']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Неверные данные']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Только POST запросы']);
}
?>