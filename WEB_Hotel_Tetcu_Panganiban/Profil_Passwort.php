<?php
  
    session_start();
    require_once('dbaccess.php');

    if(isset($_POST['safe'])) {
        $id = $_SESSION['id'];
        $old_password = $_POST['old_password'];
        $new_password1 = $_POST['new_password1'];
        $new_password2 = $_POST['new_password2'];

        $sql_old = "SELECT Passwort FROM user WHERE UID = ?";  //SQL-Befehl wird vorbereitet

        if($stmt = $db_obj->prepare($sql_old)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();                   // SQL-Befehl wird mit Parametern gebunden, ausgeführt und das Passwort in der Tabelle user wird gespeichert
            $stmt->store_result();

            if($stmt->num_rows > 0) { // Reihe mit den gesuchten Passwort wurde gefunden
                $stmt->bind_result($hashed_oldpassword); // das gehashte Passwort wird an die Variable gebunden
                $stmt->fetch();

                if(password_verify($old_password, $hashed_oldpassword)) { // das alte Passwort wird entschlüsselt 
                    if($new_password1 != $new_password2) { // wenn das neue Passwort nicht mit dem neuen wiederholten Passwort übereinstimmmt wird eine Fehlermeldung formuliert
                        $new_password_error = "Passwörter stimmmen nicht überein.";
                    }
                    else { // neue Passwörter stimmen überein und das alte Passwort wird mit dem neuen ersetzt
                        $update = "UPDATE user SET Passwort = ? WHERE UID = ?";

                        if($upstmt = $db_obj->prepare($update)) {
                            $upstmt->bind_param("si", $hashed_newpassword, $id); 
                            $hashed_newpassword = password_hash($new_password1, PASSWORD_DEFAULT); // neues Passwort wird gehasht

                            if($upstmt->execute()) {
                                session_destroy();      // neues gehashtes Passwort wurde in der Tabelle gepeichert und die Session wird zerstört
                                header("location: Login.php"); // User wird zum Login gebracht
                            }
                            else {
                                echo "Ups! Etwas ist schiefgelaufen. Bitte versuchen Sie es erneut.";
                            }
                        }
                    }
                }
                else { // eingebenes Passwort stimmt nicht mit dem alten Passwort überein und Fehlermeldun wird formuliert
                    $old_password_error = "Bitte geben Sie ihr altes Passwort ein.";
                }
            }
        }
    }

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

    
    <title>Mountain View Hotel - Profil</title>
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
                <?php if(isset($_SESSION['loggedin'])){ ?>
                    <li class="nav-item navcenter">
                        <a href="Index.php" class="nav-link">Startseite</a>
                    </li>
                    <li class="nav-item navcenter">
                        <a href="FAQ.php" class="nav-link">Hilfe</a>
                    </li>
                    <li class="nav-item navcenter">
                        <a href="Impressum.php" class="nav-link">Impressum</a>
                    </li>
                    <li class="nav-item navcenter">
                        <a href="Profil.php" class="nav-link"><u><?php echo $_SESSION['name'] ?></u></a>
                    </li>
                    <li class="nav-item navcenter">
                        <a href="Logout.php" class="nav-link">Logout</a>
                    </li>
                <?php } ?>
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
              <h2 class="text-center mb-1 fw-bold">Passwort neu setzen</h2>
            <div class="card-body p-1">
              <h6 class="text-center mb-5">Um ein neues Passwort zu setzen, geben Sie bitte Ihr altes Passwort ein.</h6>

            
            <form action="Profil_Passwort.php" method="post" autocomplete = "off">

                <div class="form-group">

                    <label class="form-label" for="password">Altes Passwort:</label>
                    <input type="password" name="old_password" id="old_password" class="form-control form-control-lg" required>
                    <?php if(isset($old_password_error)): ?> <!-- Fehlermeldung, dass nicht das alte Passwort einegegeben wurde -->
                        <span style="color:#BE0000"><?php echo $old_password_error; ?></span><br>
                    <?php endif ?>

                    <label class="form-label" for="new_password1">Neues Passwort:</label>
                    <input type="password" name="new_password1" id="new_password1" class="form-control form-control-lg" required>

                    <label class="form-label" for="new_password2">Wiederholen Sie ihr neues Passwort:</label>
                    <input type="password" name="new_password2" id="new_password2" class="form-control form-control-lg" required>
                    <?php if(isset($new_password_error)): ?> <!-- neues Passwort wurde nicht korrekt wiederholt -->
                        <span style="color:#BE0000"><?php echo $new_password_error; ?></span>
                    <?php endif ?>
                    <br>
                  
                </div>
                <div class="d-flex justify-content-center">
                  <div class="form-group">
                    <input type="submit" value="Speichern" name="safe">
                  </div>
                </div>
              </div>
            </form>
            
            

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