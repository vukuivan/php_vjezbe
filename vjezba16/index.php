<?php
$host = 'localhost';
$dbname = 'vjezba16'; 
$user = 'root';
$pass = '';

$message = "";

if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $country = $_POST['country'];

    if (strlen($username) < 5 || strlen($username) > 10) {
        $message = "<div class='alert error'>Username mora imati između 5 i 10 znakova!</div>";
    } elseif (strlen($password) < 4) {
        $message = "<div class='alert error'>Lozinka mora imati najmanje 4 znaka!</div>";
    } else {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO registered_users (first_name, last_name, email, username, password, country) 
                    VALUES (:fname, :lname, :email, :user, :pass, :country)";
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                'fname' => $firstName,
                'lname' => $lastName,
                'email' => $email,
                'user' => $username,
                'pass' => $password,
                'country' => $country
            ]);

            $message = "<div class='alert success'>Uspješna registracija!</div>";

        } catch (PDOException $e) {
            $message = "<div class='alert error'>Greška: " . $e->getMessage() . "</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <style>
        body { font-family: sans-serif; background-color: #fff; display: flex; justify-content: center; padding: 20px; }
        .form-container { width: 100%; max-width: 500px; }
        
        h1 { font-size: 24px; margin-bottom: 20px; color: #000; }
        
        label { display: block; font-weight: bold; margin-bottom: 5px; font-size: 14px; }
        .required { color: #000; } 
        
        .validation-hint { color: red; font-weight: normal; font-size: 12px; margin-left: 5px; }

        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; 
            font-size: 14px;
            background-color: #fff;
        }

        ::placeholder { color: #999; }

        select option[value=""] { color: #999; }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50; 
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-submit:hover { background-color: #45a049; }

        .alert { padding: 10px; margin-bottom: 15px; border-radius: 4px; text-align: center; }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Registration Form</h1>
    
    <?php echo $message; ?>

    <form action="" method="POST">
        
        <label>First Name *</label>
        <input type="text" name="first_name" placeholder="Your name.." required>

        <label>Last Name *</label>
        <input type="text" name="last_name" placeholder="Your last natme.." required>

        <label>Your E-mail *</label>
        <input type="email" name="email" placeholder="Your e-mail.." required>

        <label>Username:* <span class="validation-hint">(Username must have min 5 and max 10 char)</span></label>
        <input type="text" name="username" placeholder="Username.." required>

        <label>Password:* <span class="validation-hint">(Password must have min 4 char)</span></label>
        <input type="password" name="password" placeholder="Password.." required>

        <label>Country:</label>
        <select name="country">
            <option value="" disabled selected>molimo odaberite</option>
            <option value="Hrvatska">Hrvatska</option>
            <option value="BiH">Bosna i Hercegovina</option>
            <option value="Srbija">Srbija</option>
            <option value="Ostalo">Ostalo</option>
        </select>

        <button type="submit" name="submit" class="btn-submit">Submit</button>

    </form>
</div>

</body>
</html>