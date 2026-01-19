<?php
$host = 'localhost';
$dbname = 'vjezba14'; 
$user = 'root'; 
$pass = ''; 

$results = []; 
$search_term = "";
$message = "";

if (isset($_POST['submit'])) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $search_term = trim($_POST['pojam']);

        if (!empty($search_term)) {
            $sql = "SELECT * FROM users WHERE name LIKE :pojam OR lastname LIKE :pojam";
            
            $stmt = $pdo->prepare($sql);
            
            $wildcard_term = "%" . $search_term . "%";
            $stmt->execute(['pojam' => $wildcard_term]);
            
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($results) == 0) {
                $message = "Nema korisnika koji odgovaraju pojmu: " . htmlspecialchars($search_term);
            }
        } else {
            $message = "Molimo upišite pojam za pretragu.";
        }

    } catch (PDOException $e) {
        $message = "Greška pri spajanju na bazu: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Pretraga Korisnika</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 600px;
        }
        h2 { text-align: center; color: #333; }
        
        /* Forma */
        .search-box {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        button:hover { background-color: #0056b3; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            color: #555;
        }
        tr:hover { background-color: #f1f1f1; }
        
        .message {
            text-align: center;
            color: #d9534f;
            margin-top: 10px;
        }
        .badge {
            background-color: #e2e6ea;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.85em;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🔍 Pretraživanje Korisnika</h2>

    <form action="" method="POST" class="search-box">
        <input type="text" name="pojam" placeholder="Unesite ime ili prezime..." value="<?php echo htmlspecialchars($search_term); ?>" required>
        <button type="submit" name="submit">Traži</button>
    </form>

    <hr>

    <?php if (!empty($results)): ?>
        <p>Pronađeno rezultata: <strong><?php echo count($results); ?></strong></p>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime i Prezime</th>
                    <th>Korisničko ime</th>
                    <th>Država</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td>
                            <strong><?php echo htmlspecialchars($user['name']); ?></strong> 
                            <?php echo htmlspecialchars($user['lastname']); ?>
                        </td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><span class="badge"><?php echo htmlspecialchars($user['country_code']); ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (isset($_POST['submit'])): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

</div>

</body>
</html>