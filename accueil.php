<!DOCTYPE html>

<html lang="fr">

<head>

  <title>Accueil</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
  <div class="container text-center">

    <div class="row">
        <div class="col-sm-9" style="background-color:lavender;">
        <meta name="viewport" content="width=device-width, initial-scale=1"><h5>Bonjour nous somme actuellement fermé jusqu'à nouvel ordre. Mais il vous ai possible de reserver et retirer vos livre via notre service Bibliodrive !</h5><br>

        <!-- DEBUT NAVBAR -->
        <form class="d-flex">
            <input class="form-control me-2" type="text" placeholder="Recherche">
            <button class="btn btn-primary" type="button">Recherche</button>
        </form>
        <!-- FIN NAVBAR -->

        </div> 

        <div class="col-sm-3" style="background-color:lavenderblush;">
            <td><img id = photo src="TTchateau.jpg" alt="Photo chateau de moulinsart de Tintin"></td>
        </div>
        

    </div>

    <div class="row">


        <div class="col-sm-9" style="background-color:lavender;"><h5>Dernière aquisition</h5><br>
        

        <!-- DEBUT CAROUSSEL -->
            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="la.jpg" alt="Los Angeles" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="chicago.jpg" alt="Chicago" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="ny.jpg" alt="New York" class="d-block w-100">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        <!-- FIN CAROUSSEL -->
        </div>
        <div class="col-sm-3" style="background-color:lavenderblush;">
        <?php
 

            if(!isset($_POST['btnEnvoyer'])) 
  
                echo '
                <form action="" method="post">
                Nom : <input type="text" name="txtNom"><br>
                Prenom : <input type="text" name="txtPrenom"><br>
                Adresse : <input type="text" name="txtAdresse"><br>
                <input type="submit" name="btnEnvoyer" value="Envoyer" >
                </form>';
  
            else 
  
            {
                echo '<tr><td>', $_POST["txtNom"], ' |  </td><td>', $_POST["txtPrenom"],' | </td><td>', $_POST["txtAdresse"],'</td></tr>';
     
            }
        ?>

        </div>
        </div>
    </div>
</body>

</html>  