<?php
require 'db.php';

// Provjera je li poslan ID korisnika
if (!isset($_GET['id'])) {
    die("Nije odabran korisnik.");
}

$user_id = $_GET['id'];

// --- 1. LOGIKA ZA AŽURIRANJE (Kada se forma pošalje - POST) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $country_id = $_POST['country_id'];

    $sql = "UPDATE users SET first_name = ?, last_name = ?, country_id = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$first_name, $last_name, $country_id, $user_id]);

    // Preusmjeravanje nazad na listu nakon spremanja
    header("Location: index.php");
    exit;
}

// --- 2. DOHVAĆANJE PODATAKA ZA PRIKAZ U FORMI ---

// A) Dohvati podatke o odabranom korisniku
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Korisnik ne postoji.");
}

// B) Dohvati SVE države za padajući izbornik
$stmt_countries = $pdo->query("SELECT * FROM countries");
$all_countries = $stmt_countries->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Uredi korisnika</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { max-width: 400px; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Uredi korisnika: <?php echo htmlspecialchars($user['first_name']); ?></h2>

    <form method="POST">
        
        <label>Ime:</label>
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>

        <label>Prezime:</label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>

        <label>Država:</label>
        <select name="country_id">
            <?php foreach ($all_countries as $country): ?>
                <option value="<?php echo $country['id']; ?>"
                    <?php 
                        // Ovdje provjeravamo je li to trenutna država korisnika
                        // Ako jest, dodajemo 'selected' atribut
                        if ($country['id'] == $user['country_id']) {
                            echo 'selected';
                        }
                    ?>>
                    <?php echo htmlspecialchars($country['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Spremi promjene</button>
        <br><br>
        <a href="index.php">Odustani i vrati se na listu</a>
    </form>

</body>
</html>