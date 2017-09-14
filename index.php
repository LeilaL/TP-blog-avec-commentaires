<!doctype html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>TP : un blog avec des commentaires</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
  <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <?php
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=TP blog;charset=utf8', 'root', 'leilalababsa', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
  }

  // DATE_FORMAT(date_creation, '%d/%m/%Y %Hh%imin%ss') AS date_creation
  $reponse = $bdd->query('SELECT id, titre, contenu, date_creation FROM billets');
  ?>


  <h1>TP Blog</h1>
  <?php
  while ($donnees = $reponse->fetch()) {
    ?>

    <div class="news">
      <h3><?php echo $donnees['titre']; ?> <?php echo $donnees['date_creation']; ?></h3>
      <p><?php echo $donnees['contenu']; ?> <a href="commentaires.php?identificateur=<?php echo $donnees['id']; ?>">Commentaires</a></p>

    </div>

    <?php
  }


  $reponse->closeCursor(); // Termine le traitement de la requête
  ?>




  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='https://www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>
  </body>
  </html>
