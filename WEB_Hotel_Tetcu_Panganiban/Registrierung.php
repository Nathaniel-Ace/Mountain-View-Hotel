<?php
  
  // include dbaccess file
  include('dbaccess.php');
  // php-Datei, die Daten in die Datenbank speichert
  include('insert_into_db.php');

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style_login.css">

    
    <title>Mountain View Hotel - Registrierung</title>
</head>
<body>
<!-- Responsive Navbar, dunkel -->
<!-- Container erstellt in der Navbar mit links dem Hotelnamen und rechts einem Toggler der ab einer bestimmten Größe erscheint mit den Elementen darunter. Die Elemente werden bei normaler Größe angezeigt -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #bacec1">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Mountain View Hotel</a>

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
                  <a href="Login.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                  <a href="FAQ.php" class="nav-link">Hilfeseite</a>
                </li>
                <li class="nav-item">
                  <a href="Impressum.php" class="nav-link">Impressum</a>
                </li>
            </ul>
         </div>
        </div>
    </nav>


<!--  -->
<section class="vh-100 background-image" style="background-image: url(IMG/pexels-eberhard-grossgasteiger-1004665.jpg); background-repeat: no-repeat; position: relative; background-size: cover;">
  <div class="d-flex align-items-center h-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px; background-color: #f6f4e8">
            <div class="card-body p-4">
              <h2 class="text-center mb-1 fw-bold">Erstellen Sie einen Account</h2>
            <div class="card-body p-1">
              <h6 class="text-center mb-5">Zum Registrieren geben Sie bitte Ihre Daten ein.</h6>

            
            <form action="Registrierung.php" method="post" autocomplete = "off">

              <div class="form-outline mb-3 fw-bold">
                <label class="form-label" for="Anrede">Anrede:</label></br>
                <input type="radio" style="text-align: center" name="anrede" id="anrede" value="Herr">&nbspHerr &nbsp &nbsp
                <input type="radio" name="anrede" id="anrede" value="Frau">&nbspFrau
              </div>

              <div class="form-outline mb-3 fw-bold">
                <div class="form-group">
                  <label class="form-label" for="vorname">Vorname:</label>
                  <input type="text" name="vorname" id="vorname" class="form-control form-control-lg" value="<?php echo $vname; ?>" required> <!-- wenn Username schon vergeben oder Passwörter nicht überein stimmen, bleibt der Vorname stehen -->
                  
                  <label class="form-label" for="nachname">Nachname:</label>
                  <input type="text" name="nachname" id="nachname" class="form-control form-control-lg" value="<?php echo $nname; ?>" required> <!-- wenn Username schon vergeben oder Passwörter nicht überein stimmen, bleibt der Nachname stehen -->
                  
                  <label class="form-label" for="email">Email-Adresse:</label>
                  <input type="email" name="email" id="email" class="form-control form-control-lg" value="<?php echo $email; ?>" required> <!-- wenn Username schon vergeben oder Passwörter nicht überein stimmen, bleibt die Email stehen -->
                  
                  <label class="form-label" for="username">Benutzername:</label>
                  <input type="text" name="username" id="username" class="form-control form-control-lg" value="<?php echo $username; ?>" required> <!-- wenn Username schon vergeben oder Passwörter nicht überein stimmen, bleibt der Username stehen -->
                  <!-- wenn der Username schon vergeben ist kommt eine ERROR-Nachricht -->
                  <?php if(isset($username_error)): ?>
                    <span style="color:#BE0000"><?php echo $username_error; ?></span><br>
                  <?php endif ?>

                  <label class="form-label" for="password">Passwort:</label>
                  <input type="password" name="password1" id="password1" class="form-control form-control-lg" required>
                  
                  <label class="form-label" for="confirm_password">Wiederholen Sie ihr Passwort:</label>
                  <!-- wenn die Passwörter nicht überein stimmen kommt eine ERROR-Nachricht -->
                  <input type="password" name="password2" id="password2" class="form-control form-control-lg" required>
                  <?php if(isset($password_error)): ?>
                    <span style="color:#BE0000"><?php echo $password_error; ?></span>
                  <?php endif ?>
                  <br>
                  
                </div>
                <div class="d-flex justify-content-center">
                  <div class="form-group">
                    <input type="submit" value="Registrieren" name="register">
                  </div>
                </div>
              </div>
            </form>
            
            

            <p class="text-center mt-4 mb-1 pb-lg-1" style="color: #1b1b1b;">Haben Sie schon einen Account? <a href="Login.php">Loggen Sie sich hier ein</a></p> <!-- Link zur Login-Seite -->
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  </div>
</section>
                          
						

                            


						






	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>