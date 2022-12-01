<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKLEP</title>
</head>
<body>
    <form method="POST" action="login.php">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Hasło" required>
        <input type="submit" name="submit" value="Wyślij">
    </form>
   <?php
      if(isset($_POST["email"]) && isset($_POST["password"])){
        $user_password = $_POST["password"];
        $user_email = $_POST["email"];
        $con = new mysqli_connect("127.0.0.1","root","", "sklep");
        $query_login = $con->query("SELECT * FROM users WHERE email ='$user_email'");
        $res = $query_login->fetch_array();
        if(count($res) > 0) {
           if (password_verify($user_password, $res['password'])) {
              $_SESSION["current_user"] = $res['id'];
           }
        }
        if (isset($_SESSION["current_user"])){
            /* Użytkownik jest zalogowany */
         } else {
            /* Użytkownik nie jest zalogowany */
         }
      }
   ?>
</body>
</html>