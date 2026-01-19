<?php
require 'db.php'; // Uključujemo konekciju

// Dohvaćamo korisnike i njihove države
$sql = "SELECT users.id, users.first_name, users.last_name, countries.name AS country_name 
        FROM users 
        JOIN countries ON users.country_id = countries.id
        ORDER BY users.id";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Lista Korisnika</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .user-item { margin-bottom: 10px; padding: 10px; border-bottom: 1px solid #eee; }
        .last-name { color: #008060; font-weight: bold; } /* Zeleno prezime */
        .btn-edit {
            background-color: #007bff; color: white; padding: 5px 10px;
            text-decoration: none; border-radius: 4px; font-size: 14px; margin-left: 15px;
        }
    </style>
</head>
<body>

    <h2>Popis korisnika</h2>
    
    <?php foreach ($users as $user): ?>
        <div class="user-item">
            👤 
            <span><?php echo htmlspecialchars($user['first_name']); ?></span>
            <span class="last-name"><?php echo htmlspecialchars($user['last_name']); ?></span>
            <span>(<?php echo htmlspecialchars($user['country_name']); ?>)</span>

            <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn-edit">Uredi</a>
        </div>
    <?php endforeach; ?>

</body>
</html>