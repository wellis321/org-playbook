<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/db.php';

$db = getDB();

$category = $_GET['category'] ?? 'All';
$search = $_GET['search'] ?? '';

// Build query
$query = "
    SELECT s.*,
           GROUP_CONCAT(DISTINCT spu.user_type) as primary_users,
           GROUP_CONCAT(DISTINCT ske.entity_name) as key_entities,
           GROUP_CONCAT(DISTINCT sip.integration_name) as integration_points
    FROM systems s
    LEFT JOIN system_primary_users spu ON s.id = spu.system_id
    LEFT JOIN system_key_entities ske ON s.id = ske.system_id
    LEFT JOIN system_integration_points sip ON s.id = sip.system_id
    WHERE 1=1
";

$params = [];

if ($category !== 'All') {
    $query .= " AND s.category = :category";
    $params[':category'] = $category;
}

if (!empty($search)) {
    $query .= " AND (s.name LIKE :search OR s.description LIKE :search)";
    $params[':search'] = '%' . $search . '%';
}

$query .= " GROUP BY s.id ORDER BY s.name";

$stmt = $db->prepare($query);
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}
$stmt->execute();
$systems = $stmt->fetchAll();

// Process systems data
foreach ($systems as &$system) {
    $system['primaryUsers'] = $system['primary_users'] ? explode(',', $system['primary_users']) : [];
    $system['keyEntities'] = $system['key_entities'] ? explode(',', $system['key_entities']) : [];
    $system['integrationPoints'] = $system['integration_points'] ? explode(',', $system['integration_points']) : [];
    unset($system['primary_users'], $system['key_entities'], $system['integration_points']);
}

echo json_encode($systems);
