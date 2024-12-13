<?php

// fichier : session1.php
session_start();

?>

<!DOCTYPE html>

<html>

<body>

<?php

 

echo 'On ajoute une entree dans le tableau $_SESSION de visibilité super globale';

$_SESSION["x"] = 5454545454;

 

?>

</body>

</html>