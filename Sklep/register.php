<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKLEP</title>
</head>
<body>
    <form method="POST" action="register.php">
        <input type="text" name="name" placeholder="Login" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Hasło" required>
        <input type="submit" name="submit" value="Wyślij">
    </form>
   
</body>
<?php
    $db_host = "localhost";            // np. localhost
    $db_name = "sklep";                 // np. test
    $db_user = "root";           // np. root
    $db_pass = "";  // np. puste "" 
    $db_conn = mysqli_connect($db_host,$db_user,$db_pass)
    or die ("Odpowiedź: Błąd połączenia z serwerem $host");
    mysqli_select_db($db_conn, $db_name) or die("Trwa konserwacja bazy danych… Odśwież stronę za kilka sekund.");
    $user_fullname = mysqli_real_escape_string($db_conn, $_POST["name"]);
    $user_email = mysqli_real_escape_string($db_conn, $_POST["email"]);
    $user_password = mysqli_real_escape_string($db_conn, $_POST["password"]);
    $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
    if (mysqli_query($db_conn, "INSERT INTO users (name,email,password) VALUES ('$user_fullname', '$user_email', '$user_password_hash')")){
        echo "Rejestracja przebiegła poprawnie";
        header("location:index.php");
     } else{
        echo "Nieoczekiwany błąd - użytkownik już istnieje lub błąd serwera MySQL.";
     }
     
?>
</html>