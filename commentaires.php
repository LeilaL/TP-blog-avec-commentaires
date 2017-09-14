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


$num = $_GET['identif'];
// DATE_FORMAT(date_creation, '%d/%m/%Y %Hh%imin%ss') AS date_creation
$reponse = $bdd->prepare('SELECT titre, contenu, date_creation FROM billets WHERE id=?');
$reponse->execute([$num]);
?>


<h1>TP Blog</h1>
<?php
       $x= $reponse->fetch();

       {
           ?>
<a href="index.php">Retour à la liste des billets</a>
        <div class="news">
<h3><?php echo $x['titre'];?> <?php echo $x['date_creation'];?></h3>
<p><?php echo $x['contenu']; ?></p>
        </div>

<?php
       }
 $coms = $bdd->prepare('SELECT auteur, commentaire, date_commentaire FROM commentaires WHERE id_billet=?');
 $coms->execute([$num]);


while ($do = $coms->fetch())

       {
         ?>

          <p><strong><?php echo $do['auteur'];?></strong> <?php echo $do['date_commentaire'];?></p>
          <p><?php echo $do['commentaire'];?></p>
<?php
       }

       $reponse->closeCursor(); // Termine le traitement de la requête
      //  header('Location: index.php');
?>
