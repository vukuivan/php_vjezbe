<?php
    function wordCount($niz){
        $brojRijeci = str_word_count($niz);
        echo "<p class='rezultat'>Ulazni niz: $niz sadrži $brojRijeci riječi.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broj riječi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .rezultat {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 98%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            font-weight: bold;
        }
        input, button {
            width: 10%;
            margin: 10px 0;
            padding: 8px;
            font-size: 16px;
        }
        .text{
            width: 90%;
        }
        label{
            font-weight: bold;
        }
        .unos{
            display: block;
        }
        li{
            list-style-type: none;
        }
    </style>
</head>
<body>
    <h1>Zadatak str_word_count</h1>
    <form method="POST" action="" target="_self">
        <div>    
            <label for="niz">Ulazni niz</label>
            <input class="text" type="Text" id="niz" name="niz">
        </div>
        <input type="submit" value="ispiši broj riječi">
    </form>
    <?php
        if(isset($_POST['niz'])){
            wordCount($_POST['niz']);
        }
    ?>
</body>
</html>