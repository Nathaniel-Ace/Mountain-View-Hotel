<?php
  // Datenbankverbindung
  include('dbaccess.php');

  // php-Datei, die Usernamen und Passwort mit der Datenbank vergleicht
  include('authenticate.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mountain View Hotel - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Stylesheet.css">
</head>

<body id="bgcolorlogin">
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #bacec1">
    <div class="container-fluid">
        <a href="Index.php" class="navbar-brand">Mountain View Hotel</a>
     

    <button 
    class="navbar-toggler"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navmenu">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="Index.php" class="nav-link">Startseite</a>
            </li>
            <li class="nav-item">
              <a href="Registrierung.php" class="nav-link">Registrierung</a>
            </li>
            <li class="nav-item">
              <a href="FAQ.php" class="nav-link">Hilfe</a>
            </li>
            <li class="nav-item">
              <a href="Impressum.php" class="nav-link">Impressum</a>
            </li>
        </ul>
     </div>
    </div>
</nav>

<div class="parent clearfix">
    <div class="bg-illustration">
        </div>
        
          <div class="login">
            <div class="container">
            <h1 style="color: #274227">Loggen Sie sich ein</h1>
        
            <div class="login-form">
              <form action="Login.php" method="post" autocomplete="off">
                <input type="text" class="form-control" name="username" placeholder="Benutzername" id="username" required>
                <!-- wenn der Username falsch ist kommt eine ERROR-Nachricht -->
                <?php if(isset($username_error)): ?>
                  <span style="color:#BE0000"><?php echo $username_error; ?></span><br>
                <?php endif ?>

                <input type="password" class="form-control" name="password" placeholder="Passwort" id="password" required><br>
                <!-- wenn das Passwort falsch ist kommt eine ERROR-Nachricht -->
                <?php if(isset($password_error)): ?>
                  <span style="color:#BE0000"><?php echo $password_error; ?></span><br>
                <?php endif ?>
                <br>

                <div class="Account">
                  <a href="Registrierung.html"><h6>Haben Sie noch keinen Account?</h6></a> <!-- Link zur Registrierungsseite -->
                </div>
                
                <button type="submit" name="login" id="login">LOGIN</button>
    
              </form>
            </div>
        
          </div>
          </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 

      

</body>
</html>