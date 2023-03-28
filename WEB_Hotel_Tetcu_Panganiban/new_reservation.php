<?php

    session_start();
    include('dbaccess.php');

    if(isset($_POST['reserve'])) {

      $timestamp = date("Y-m-d H:i"); // date speichert das Datum und die Zeit 
      $arrival = $_POST['ankunft'];
      $departure = $_POST['abreise'];   //abgeschickte Daten werden mit Variablen verbunden
      $breakfast = $_POST['Frühstück'];
      $parking = $_POST['Parkplatz'];
      $pets = $_POST['Haustier'];

      $check_time = "SELECT * FROM reservierung WHERE (Ankunft >= ? AND Ankunft <= ?) OR (Abreise >= ? AND Abreise <= ?)"; //hier wird überprüft ob das Zimmer frei für dengeählten Zeitraum ist
      $stmt = $db_obj->prepare($check_time);
      $stmt->bind_param("ssss", $arrival, $departure, $arrival, $departure);
      $stmt->execute();
      $result = $stmt->get_result();

      if(mysqli_num_rows($result) > 0) {
        $availability_error = "Das ausgewählte Zeitfenster <br> ist nicht verfügbar.";
      }
      else {  // wenn das Zimmer frei ist werden die Daten in die Datenbank gespeichert
        $sql = "INSERT INTO reservierung (Ankunft, Abreise, Frühstück, Parkplatz, Haustiere, UID, Username, timestamp)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $db_obj->prepare($sql);

        $stmt->bind_param("sssssiss", $arrival, $departure, $breakfast, $parking, $pets, $_SESSION['id'], $_SESSION['name'], $timestamp);

        if($stmt->execute()) {
          header("location: Reservierung.php");
        }
        else {
            echo "Error";
        }
      
        $stmt->close();
        $db_obj->close();
      }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mountain View Hotel - Hilfe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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
          <?php if(isset($_SESSION['loggedin'])){ ?>
            <li class="nav-item">
              <a href="Index.php" class="nav-link">Startseite</a>
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

<section class="vh-100 background-image" style="background-image: url(IMG/pexels-eberhard-grossgasteiger-1004665.jpg); background-repeat: no-repeat; position: relative; background-size: cover;">
  <div class="d-flex align-items-center h-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px; background-color: #f6f4e8">
            <div class="card-body p-4">
              <h2 class="text-center mb-1 fw-bold">Zimmerreservierung</h2>

                <form method="post"  action="new_reservation.php">
                    
                    <div class="d-flex justify-content-center">
                        <div class="form-group">
                            <div class="form-outline mb-3 fw-bold">
                                <label for="ankunft">Ankunft:</label>
                                <div class="field">
                                    <input type="date" id="ankunft" name="ankunft" required>
                                </div>
                            </div>
                        
                            <div class="form-outline mb-3 fw-bold">
                                <label for="abreise">Abreise:</label>
                                <div class="field">
                                    <input type="date" id="abreise" name="abreise" required><br>
                                    <?php if(isset($availability_error)): ?>
                                      <span style="color:#BE0000"><?php echo $availability_error; ?></span><br>
                                    <?php endif ?>
                                </div>
                            </div>
                        
                            <div class="form-outline mb-3 fw-bold">
                                <fieldset>
                                    <label>Frühstück:</label>
                                    <input type="radio" id ="Frühstück" name="Frühstück" value="mit">
                                    <label for="Frühstück">mit</label>

                                    <input type="radio" id="Frühstück" name="Frühstück" value="ohne">
                                    <label for="Frühstück">ohne</label>
                                    <p>Aufpreis 15€ / Tag</p>
                                </fieldset>
                                <fieldset>
                                    <label>Parkplatz:</label>
                                    <input type="radio" id ="Parkplatz" name="Parkplatz" value="mit">
                                    <label for="Parkplatz">mit</label>

                                    <input type="radio" id="Parkplatz" name="Parkplatz" value="ohne">
                                    <label for="Parkplatz">ohne</label>
                                    <p>Aufpreis 10€ / Tag</p>
                                </fieldset>
                                <fieldset>
                                    <label>Haustiere:</label>
                                    <input type="radio" id ="Haustier" name="Haustier" value="mit">
                                    <label for="Haustier">mit</label>

                                    <input type="radio" id="Haustier" name="Haustier" value="ohne">
                                    <label for="Haustier">ohne</label>
                                    <p>Aufpreis 10€ / Tag</p>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <div class="form-group">
                            <input type="submit" value="Reservieren" name="reserve">
                        
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