<?php
session_start();
require_once __DIR__ . '/../includes/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        $db = getDB();
        $stmt = $db->prepare("SELECT id, username, password_hash FROM admin_users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user_id'] = $user['id'];
            $_SESSION['admin_username'] = $user['username'];

            // Update last login
            $updateStmt = $db->prepare("UPDATE admin_users SET last_login = NOW() WHERE id = :id");
            $updateStmt->execute([':id' => $user['id']]);

            header('Location: /admin/dashboard.php');
            exit;
        } else {
            $error = 'Invalid username or password';
        }
    } else {
        $error = 'Please enter both username and password';
    }
}

$pageTitle = 'Admin Login';
include __DIR__ . '/../includes/header.php';
?>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 min-h-screen flex items-center justify-center py-16">
    <div class="max-w-md w-full">
        <div class="rounded-xl bg-white p-8 shadow-sm">
            <h1 class="mb-6 text-3xl font-bold text-slate-800 text-center">Admin Login</h1>

            <?php if ($error): ?>
                <div class="mb-4 rounded-lg bg-red-50 border border-red-200 p-4">
                    <p class="text-sm text-red-800"><?php echo htmlspecialchars($error); ?></p>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-slate-700 mb-1">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        required
                        class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        autofocus
                    />
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    />
                </div>

                <button
                    type="submit"
                    class="w-full rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Login
                </button>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer-close.php'; ?>
