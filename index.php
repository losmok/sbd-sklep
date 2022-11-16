<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKLEP</title>
</head>
<body>
    <?php
        if(isset($_POST["submit"])){
        if($_POST["haslo"] == "sekret1"){
    ?>
     Tutaj jest chroniona zawartość...
    <?php
        function logowanie() {
     
            if($_SESSION['logowanie'] == 'poprawne') {
                 
               $string  = '<FORM action="'.getenv(REQUEST_URI).'" method="post">';
                  $string .= '   <INPUT type="submit" name="wylogowanie" value="Wyloguj">';
                  $string .= '</FORM>';
                   
            } else {
               $string = '<FORM action="'.getenv(REQUEST_URI).'" method="post">';
                  $string .= '<UL style="list-style-type: none; margin: 0; padding:
            0;">';
                   
                  if(isset($_SESSION['logowanie'])) $string .=
            '<LI>'.$_SESSION['logowanie'].'</LI>';
                   
                  $string .= '<LI>Login: <INPUT type="text" name="login"></LI>';
                  $string .= '<LI>Haslo: <INPUT type="text" name="haslo"></LI>';
                  $string .= '<LI><INPUT type="submit" name="logowanie" value="Logowanie"></LI>';
                  $string .= '</UL>';
                  $string .= '</FORM>';
                   
            }
            return $string;
            }
            
 <form method="POST">
     <input type="password" name="haslo" placeholder="Podaj hasło">
     <input type="submit" name="submit" value="Wyślij">
 </form>
</body>
</html>