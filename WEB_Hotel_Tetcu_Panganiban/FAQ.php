<?php
  // Session wird gestartet
  session_start();
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
            <?php if(isset($_SESSION['name']) && $_SESSION['name'] == 'admin') { ?>
                  <li class="nav-item navcenter">
                    <a href="Index.php" class="nav-link">Startseite</a>
                  </li>
                  <li class="nav-item navcenter">
                    <a href="Impressum.php" class="nav-link">Impressum</a>
                  </li>
                  <li>
                    <a href="Reservierverwaltung.php" class="nav-link">Reservierungsverwaltung</a>
                  </li>
                  <li class="nav-item navcenter">
                    <a href="Userverwaltung.php" class="nav-link">Userverwaltung</a>
                  </li>
                  <li class="nav-item navcenter">
                    <a href="Logout.php" class="nav-link">Logout</a>
                  </li>
                <?php } else {?>
                  <li class="nav-item navcenter">
                    <a href="Index.php" class="nav-link">Startseite</a>
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
          <?php } else { ?>
            <li class="nav-item">
              <a href="Index.php" class="nav-link">Startseite</a>
            </li>
            <li class="nav-item">
              <a href="Login.php" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
              <a href="Registrierung.php" class="nav-link">Registrierung</a>
            </li>
            <li class="nav-item">
              <a href="Impressum.php" class="nav-link">Impressum</a>
            </li>
          <?php } ?>
        </ul>
     </div>
    </div>
</nav>

<section class="main-content">
    <div class="container">
      <h1 class="text-center text-uppercase mb-5"><strong>FAQ</strong></h1>
      <br>
      <br>
      <div class="row flex-center">
        <div class="col-sm-10 offset-sm-2">
          <div class="accordion" id="accordionExample">
 
          <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                <span>Kann man eine Buchung stornieren?</span> </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">Sie können eine Buchung bis zu 7 Tage vorher kostenlos stornieren. Bei einer Stornierung bis zu 4 Tage vorher bekommen Sie 50% des Buchungspreises zurück. Wenn Sie weniger als 4 Tage vorher stornieren, können wir Ihnen den Betrag leider nicht zurückerstatten. </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                <span>Ab wann kann ich einchecken und bis wann muss ich auschecken?</span> </button>
                  </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">Sie können in der Regel ab 13 Uhr Ihr Hotelzimmer beziehen. Falls Sie später als 22 Uhr anreisen können Sie uns unter der Telefonnummer 0676123456 erreichen. Auschecken müssen Sie bis 11 Uhr.</div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> 
                  <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                <span>Gibt es einen Hotelparkplatz?</span></button>
                  </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">Ihnen steht ein Hoteleigener Parkplatz zur verfügung für einen Aufpreis von 10 Euro pro Tag. Parkplätze stehen am Anreisetag ab frühestens 12 Uhr und am Abreisetag bis spätestens 11 Uhr zur Verfügung.</div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> 
                  <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                <span>Kann ich mein Haustier mitnehmen?</span></button>
                  </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">Haustiere sind bei uns prinzipiell herzlich willkommen. Wir bitten Sie, vorher mit dem Hotel Rücksprache zu halten aus organisatorischen Gründen. Es wird außerdem ein Betrag von 15 € wird pro Tag dafür fällig.</div>
              </div>
            </div>


            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"> 
                  <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                <span>Gibt es einen Hotelshuttle zum nächsten Flughafen oder Bahnhof?</span></button>
                  </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">Diesen Service bieten wir leider nicht an. Sie können jedoch mit dem Personal bei der Hotelrezeption Rücksprache halten, dann können diese für Sie ein Taxi organisieren.</div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"> 
                  <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                <span>Gibt es WLAN im Hotel und auf den Zimmern?</span></button>
                  </button>
              </h2>
              <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                <div class="accordion-body">Unser Hotel bietet seinen Gästen selbstverständlich auf dem Zimmer und in den öffentlichen Bereichen kostenfreies WLAN an.</div>
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