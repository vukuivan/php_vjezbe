<?php
$host = 'localhost';
$dbname = 'vjezba17';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT 
                users.first_name, 
                users.last_name, 
                countries.name AS country_name 
            FROM users 
            JOIN countries ON users.country_id = countries.id
            ORDER BY users.first_name ASC"; 

    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Greška pri spajanju na bazu: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Popis Korisnika</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .user-item {
            margin-bottom: 15px;
            font-size: 18px;
            color: #333;
        }
        .icon {
            color: #666;
            margin-right: 8px;
        }
        .last-name {
            color: #008060; 
        }
        .country {
            color: #333;
        }
    </style>
</head>
<body>

    <div class="user-list">
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <div class="user-item">
                    <span class="icon">👤</span>
                    
                    <span><?php echo htmlspecialchars($user['first_name']); ?></span>
                    
                    <span class="last-name"><?php echo htmlspecialchars($user['last_name']); ?></span>
                    
                    <span class="country">(<?php echo htmlspecialchars($user['country_name']); ?>)</span>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nema pronađenih korisnika.</p>
        <?php endif; ?>
    </div>

</body>
</html>