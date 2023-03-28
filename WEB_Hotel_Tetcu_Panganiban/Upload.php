<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style_login.css">

    
    <title>West Isle Hotel - Upload</title>
</head>
<body>
<!-- Responsive Navbar, dunkel -->
<!-- Container erstellt in der Navbar mit links dem Hotelnamen und rechts einem Toggler der ab einer bestimmten Größe erscheint mit den Elementen darunter. Die Elemente werden bei normaler Größe angezeigt -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #bacec1">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">West Isle Hotel</a>

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
                    <a href="FAQ.php" class="nav-link">Hilfeseite</a>
                </li>
                <li class="nav-item">
                    <a href="Impressum.php" class="nav-link">Impressum</a>
                </li>
                <li class="nav-item">
                    <a href="Logout.php" class="nav-link">Logout</a>
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
              <h2 class="text-center mb-1 fw-bold">Laden Sie hier Dokumente hoch.</h2>


              
            <form action="Upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="document" id="document" accept="application/pdf"><br>
                <input type="submit" value="Abschicken"/>
            </form>
            
            <?php
            if (isset($_FILES["document"])) {

                if ($_FILES["document"]["type"] == "application/pdf") {
                    //var_dump($_FILES["picture"]);
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/WEB_Hotel_Tetcu_Panganiban/documents/" . $_FILES["document"]["name"];
                    //echo $destinationPath;
                    move_uploaded_file($_FILES["document"]["tmp_name"], $destinationPath);
                    echo "Dokument wurde hochgeladen.";
                } 
                else {
                    echo "Es wurde kein pdf-Dokument ausgewählt.";
                }
            }

    ?>

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