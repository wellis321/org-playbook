<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$db = getDB();

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['feedback_type']) || !isset($data['feedback_text'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

try {
    $stmt = $db->prepare("
        INSERT INTO feedback (feedback_type, feedback_text, url, `system`, is_anonymous, user_agent, screen_size)
        VALUES (:feedback_type, :feedback_text, :url, :system, :is_anonymous, :user_agent, :screen_size)
    ");

    $stmt->execute([
        ':feedback_type' => $data['feedback_type'],
        ':feedback_text' => $data['feedback_text'],
        ':url' => $data['url'] ?? null,
        ':system' => $data['system'] ?? null,
        ':is_anonymous' => $data['is_anonymous'] ?? false,
        ':user_agent' => $data['user_agent'] ?? null,
        ':screen_size' => $data['screen_size'] ?? null
    ]);

    echo json_encode(['success' => true, 'message' => 'Feedback submitted successfully']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to submit feedback']);
}
