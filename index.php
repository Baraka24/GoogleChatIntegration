<?php
require 'db.php';

function getUsers() {
    $pdo = getDbConnection();
    $stmt = $pdo->query('SELECT id, name, email FROM users');
    return $stmt->fetchAll();
}

$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">User List</h1>
    <ul class="list-group">
        <?php foreach ($users as $user): ?>
            <li class="list-group-item">
                <?php echo htmlspecialchars($user['name']); ?>
                <a href="https://mail.google.com/chat/u/0/#chat/welcome?peep=<?php echo htmlspecialchars($user['email']); ?>"
                   target="_blank"
                   class="btn btn-primary btn-sm float-right">
                    Chat
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
