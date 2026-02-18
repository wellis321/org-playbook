<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../includes/db.php';

requireAdminLogin();

$db = getDB();
$action = $_GET['action'] ?? 'list';
$systemId = $_GET['id'] ?? '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'create' || $action === 'edit') {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $category = $_POST['category'] ?? '';
        $primaryUsersText = $_POST['primary_users'] ?? '';
        $keyEntitiesText = $_POST['key_entities'] ?? '';
        $integrationPointsText = $_POST['integration_points'] ?? '';

        $primaryUsers = array_filter(array_map('trim', explode("\n", $primaryUsersText)));
        $keyEntities = array_filter(array_map('trim', explode("\n", $keyEntitiesText)));
        $integrationPoints = array_filter(array_map('trim', explode("\n", $integrationPointsText)));

        if (!empty($name) && !empty($description) && !empty($category)) {
            if ($action === 'create') {
                $stmt = $db->prepare("INSERT INTO systems (id, name, description, category) VALUES (:id, :name, :description, :category)");
                $stmt->execute([
                    ':id' => $id,
                    ':name' => $name,
                    ':description' => $description,
                    ':category' => $category
                ]);
            } else {
                $stmt = $db->prepare("UPDATE systems SET name = :name, description = :description, category = :category WHERE id = :id");
                $stmt->execute([
                    ':id' => $id,
                    ':name' => $name,
                    ':description' => $description,
                    ':category' => $category
                ]);

                // Delete existing relationships
                $db->prepare("DELETE FROM system_primary_users WHERE system_id = :id")->execute([':id' => $id]);
                $db->prepare("DELETE FROM system_key_entities WHERE system_id = :id")->execute([':id' => $id]);
                $db->prepare("DELETE FROM system_integration_points WHERE system_id = :id")->execute([':id' => $id]);
            }

            // Insert relationships
            foreach ($primaryUsers as $user) {
                $stmt = $db->prepare("INSERT INTO system_primary_users (system_id, user_type) VALUES (:system_id, :user_type)");
                $stmt->execute([':system_id' => $id, ':user_type' => $user]);
            }

            foreach ($keyEntities as $entity) {
                $stmt = $db->prepare("INSERT INTO system_key_entities (system_id, entity_name) VALUES (:system_id, :entity_name)");
                $stmt->execute([':system_id' => $id, ':entity_name' => $entity]);
            }

            foreach ($integrationPoints as $integration) {
                $stmt = $db->prepare("INSERT INTO system_integration_points (system_id, integration_name) VALUES (:system_id, :integration_name)");
                $stmt->execute([':system_id' => $id, ':integration_name' => $integration]);
            }

            header('Location: /admin/systems.php');
            exit;
        }
    } elseif ($action === 'delete' && !empty($systemId)) {
        $stmt = $db->prepare("DELETE FROM systems WHERE id = :id");
        $stmt->execute([':id' => $systemId]);
        header('Location: /admin/systems.php');
        exit;
    }
}

$pageTitle = 'Manage Systems';
include __DIR__ . '/../includes/header.php';

if ($action === 'create' || $action === 'edit') {
    $system = null;
    $primaryUsers = [];
    $keyEntities = [];
    $integrationPoints = [];

    if ($action === 'edit' && !empty($systemId)) {
        $stmt = $db->prepare("SELECT * FROM systems WHERE id = :id");
        $stmt->execute([':id' => $systemId]);
        $system = $stmt->fetch();

        if ($system) {
            $stmt = $db->prepare("SELECT user_type FROM system_primary_users WHERE system_id = :id");
            $stmt->execute([':id' => $systemId]);
            $primaryUsers = $stmt->fetchAll(PDO::FETCH_COLUMN);

            $stmt = $db->prepare("SELECT entity_name FROM system_key_entities WHERE system_id = :id");
            $stmt->execute([':id' => $systemId]);
            $keyEntities = $stmt->fetchAll(PDO::FETCH_COLUMN);

            $stmt = $db->prepare("SELECT integration_name FROM system_integration_points WHERE system_id = :id");
            $stmt->execute([':id' => $systemId]);
            $integrationPoints = $stmt->fetchAll(PDO::FETCH_COLUMN);
        }
    }

    include __DIR__ . '/systems-form.php';
} else {
    // List all systems
    $systems = $db->query("SELECT * FROM systems ORDER BY name")->fetchAll();
    include __DIR__ . '/systems-list.php';
}

include __DIR__ . '/../includes/footer-close.php';
?>
