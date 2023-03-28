<?php

  session_start();
  

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./res/css/style.css">
    <title>Mountain View Hotel - Home</title>
</head>
<body>
    <!-- Navbar responsive, größe definiert ab wann sie responsive wird, Farben von Schrift, Navbarfarbe zum Schluss und der Name vom Hotel -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #bacec1;">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Mountain View Hotel</a>

    <!-- collapse definiert, dass das Toggle beim kleiner machen aktiviert wird; Pointer navmenu limitiert die Togglefunktion nur auf die unteren Seitenbezeichnungen -->
        <button 
        class="navbar-toggler" 
        type="button" 
        data-bs-toggle="collapse" 
        data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
        </button>
    
    <!-- navbar rasponsive mit dem Pointer, ms-auto beudeutet, dass die Icons dann auf die rechte Seite gedrückt werden automatisch-->
    <!-- Links zu den anderen Teilen der Webpage -->
          <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
              <!-- hier wird überprüft ob ein User eingeloggt ist
              ist ein User eingeloggt werden in der Navbar andere Seiten angezeigt -->
              <?php if(isset($_SESSION['loggedin'])){ ?>
                <!-- Admin hat Zugriff auf andere Seiten -->
                <?php if(isset($_SESSION['name']) && $_SESSION['name'] == 'admin') { ?>
                  <li class="nav-item navcenter">
                    <a href="FAQ.php" class="nav-link">Hilfe</a>
                  </li>
                  <li class="nav-item navcenter">
                    <a href="Impressum.php" class="nav-link">Impressum</a>
                  </li>
                  <li>
                    <a href="Reservierverwaltung.php" class="nav-link">Reservierverwaltung</a>
                  </li>
                  <li class="nav-item navcenter">
                    <a href="Userverwaltung.php" class="nav-link">Userverwaltung</a>
                  </li>
                  <li class="nav-item navcenter">
                    <a href="Logout.php" class="nav-link">Logout</a>
                  </li>
                <?php } else {?>

                  <li class="nav-item navcenter">
                    <a href="FAQ.php" class="nav-link">Hilfe</a>
                  </li>
                  <li class="nav-item navcenter">
                    <a href="Impressum.php" class="nav-link">Impressum</a>
                  </li>
                  <li class="nav-item navcenter">
                    <a href="Reservierung.php" class="nav-link">Reservierung</a>
                  </li>
                  <li class="nav-item navcenter">
                  <a href="Profil.php" class="nav-link"><u><?php echo $_SESSION['name'] ?></u></a>
                  </li>
                  <li class="nav-item navcenter">
                    <a href="Logout.php" class="nav-link">Logout</a>
                  </li>

                <?php } ?>
              <!-- anonyme User haben Zugriff auf diese Seiten -->
              <?php } else { ?>
                <li class="nav-item navcenter">
                  <a href="Login.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item navcenter">
                  <a href="Registrierung.php" class="nav-link">Registrierung</a>
                </li>
                <li class="nav-item navcenter">
                  <a href="FAQ.php" class="nav-link">Hilfe</a>
                </li>
                <li class="nav-item navcenter">
                  <a href="Impressum.php" class="nav-link">Impressum</a>
                </li>
              <?php } ?>
                
            </ul>
          </div>
        </div>
    </nav> 

  

<!-- Showcase mit Fotos im Carousel -->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img id="img" src="IMG/erstesfoto.jpg" class="d-block w-100" alt="1">
    </div>
    <div class="carousel-item">
      <img id="img" src="IMG/zweites.jpg" class="d-block w-100" alt="2">
    </div>
    <div class="carousel-item">
      <img id="img" src="IMG/drittesfoto.jpg" class="d-block w-100" alt="3">
    </div>
  
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
