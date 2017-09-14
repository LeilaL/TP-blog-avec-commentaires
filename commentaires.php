<!doctype html>
<html class="no-js" lang="">
<head>
<title>TP : un blog avec des commentaires</title>
<link rel="stylesheet" href="css/style.css">
</head>
</html>
<?php
try {
      $bdd = new PDO('mysql:host=localhost;dbname=TP blog;charset=utf8', 'root', 'leilalababsa', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }

  catch(Exception $e)  {
          die('Erreur : '.$e->getMessage());
  }

// DATE_FORMAT(date_creation, '%d/%m/%Y %Hh%imin%ss') AS date_creation
$reponse = $bdd->query('SELECT titre, contenu, date_creation FROM billets ORDER BY ID DESC LIMIT 0,5');
?>


<h1>TP Blog</h1>
<?php
       while ($donnees = $reponse->fetch())

       {
           ?>
<a href="index.php">Retour à la liste des billets</a>
        <div class="news">
<h3><?php echo $donnees['titre'];?> <?php echo $donnees['date_creation'];?></h3>
<p><?php echo $donnees['contenu']; ?></p>
        </div>

<?php
       }


       $reponse->closeCursor(); // Termine le traitement de la requête
      //  header('Location: index.php');
?>
