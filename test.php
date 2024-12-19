<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <?php
    /*DEBUT FORMULAIRE*/
    if (!isset($_POST['chercher'])) { /* L'entrée chercher est vide = le formulaire n'a pas été submit=posté, on affiche le formulaire */
      echo '
        <form action="" method = "post" ">
        <br><br>
        nomauteur: <input name="nomauteur" type="text" size ="30"">
        <br><br>
        <input type="submit" name="chercher"  value="Rechercher">
        </form>';
      } 
    else
    /* L'utilisateur a cliqué sur Se connecter, l'entrée btnSeConnecter <> vide, on traite le formulaire */
    // Bouton de connection
    {
      require_once 'connexion-bdrive.php';
        $livre = $_POST['livre'];

        $stmt = $connexion->prepare("SELECT livre.titre FROM livre inner join auteur on (livre.noauteur = auteur.noauteur) where nom = nomauteur");
        $stmt->bindValue(":livre", $livre);
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $stmt->execute();
        $enregistrement = $stmt->fetch(); // boucle while inutile

        if ($enregistrement) {
          echo '<h4>Voici vos livres '.$enregistrement->titre.'</h4>';
      }
    }
    ?>
</body>
</html>