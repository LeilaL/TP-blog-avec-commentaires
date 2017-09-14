<!doctype html>
<html class="no-js" lang="">
<head>
  <title>TP : un blog avec des commentaires</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<?php
try {
  $bdd = new PDO('mysql:host=localhost;dbname=TP blog;charset=utf8', 'root', 'leilalababsa', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
  die('Erreur : '.$e->getMessage());
}


$id_num = $_GET['identificateur'];
// DATE_FORMAT(date_creation, '%d/%m/%Y %Hh%imin%ss') AS date_creation
$reponse = $bdd->prepare('SELECT titre, contenu, date_creation FROM billets WHERE id=?');
$reponse->execute([$id_num]);
?>


<h1>TP Blog</h1>
<?php
$show_billet= $reponse->fetch();

{
  ?>
  <a href="index.php">Retour à la liste des billets</a>
  <div class="news">
    <h3><?php echo $show_billet['titre'];?> <?php echo $show_billet['date_creation'];?></h3>
    <p><?php echo $show_billet['contenu']; ?></p>
  </div>

  <?php
}
$coms = $bdd->prepare('SELECT auteur, commentaire, date_commentaire FROM commentaires WHERE id_billet=?');
$coms->execute([$id_num]);


while ($show_comments = $coms->fetch()) {
  ?>

  <p><strong><?php echo $show_comments['auteur']; ?></strong> <?php echo $show_comments['date_commentaire']; ?></p>
  <p><?php echo $show_comments['commentaire']; ?></p>
  <?php
}

$reponse->closeCursor();
//  header('Location: index.php');
?>
</html>
