<?php
// Get page title and description, with defaults
$pageTitle = isset($pageTitle) ? $pageTitle : 'Organisation Playbook';
$pageDescription = isset($pageDescription) ? $pageDescription : 'A human-centered approach to building organisations that work for people, not the other way around.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <!-- Tailwind CSS CDN (for local development) -->
    <!-- For production, replace with compiled CSS: <link rel="stylesheet" href="/assets/css/style.min.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex min-h-screen flex-col">
        <?php include __DIR__ . '/navbar.php'; ?>
        <div class="flex-grow">
