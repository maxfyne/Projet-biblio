<!-- VARIABLE DE SESSION A METTRE DANS UNE SECONDE PAGE-->


<?php

// fichier : session1.php
session_start();

?>


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
                        <img src="la.jpg" alt="Los Angeles" class="d-block w-100" style="width:25%">
                    </div>
                    <div class="carousel-item">
                        <img src="chicago.jpg" alt="Chicago" class="d-block w-100" style="width:25%">
                    </div>
                    <div class="carousel-item">
                        <img src="ny.jpg" alt="New York" class="d-block w-100" style="width:25%">
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
        /*DEBUT FORMULAIRE*/
            if (!isset($_POST['btnSeConnecter'])) { /* L'entrée btnSeConnecter est vide = le formulaire n'a pas été submit=posté, on affiche le formulaire */
                echo '
                    <form action="" method = "post" ">
                    <br><br>
                    Mel: <input name="mel" type="text" size ="30"">
                    <br><br>
                    Mot de passe: <input name="motdepasse" type="text" size ="30"">
                    <br><br>
                    <input type="submit" name="btnSeConnecter"  value="Se connecter">
                    </form>';
            } 
            else
            /* L'utilisateur a cliqué sur Se connecter, l'entrée btnSeConnecter <> vide, on traite le formulaire */
            {
                // Bouton de connection
                require_once 'connexion-bdrive.php';
                $mel = $_POST['mel'];
                $motdepasse = $_POST['motdepasse'];

                $stmt = $connexion->prepare("SELECT * FROM utilisateur where mel=:mel AND motdepasse=:motdepasse");
                $stmt->bindValue(":mel", $mel); // pas de troisième paramètre STR par défaut
                $stmt->bindValue(":motdepasse", $motdepasse); // de meme
                $stmt->setFetchMode(PDO::FETCH_OBJ);

                // Les résultats retournés par la requête seront traités en 'mode' objet

                $stmt->execute();
                $enregistrement = $stmt->fetch(); // boucle while inutile

                if ($enregistrement) {
                    echo '<h4>Connexion réussie ! Bienvenue '.$enregistrement->prenom.'</h4>';

                    // variable de session 
                    $prenom = $enregistrement->prenom;
                    $nom = $enregistrement->nom;
                    $_SESSION["prenom"] = $enregistrement->prenom;
                    $_SESSION["nom"] = $enregistrement->nom;
                }
                else {
                    echo "Echec à la connexion.";
                }               
                // Bouton de déconnexion
                if (!isset($_POST['btnSeDeconnecter'])) {
                    echo '
                        <form action="" method = "post" ">
                        <input type="submit" name="btnSeDeconnecter" value="Se déconnecter">
                        </form>';
                    
                    // Traitement de la déconnexion
                    if (isset($_POST['btnSeDeconnecter'])) {
                        session_unset(); // Supprime toutes les variables de session
                        echo '<h4>Vous êtes déconnecté.</h4>';
                    }
                }
            }
        /*FIN FORMULAIRE*/
        ?>

        </div>
        </div>
    </div>
</body>

</html>  