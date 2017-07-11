<?php

session_start();
include("modele/Client.php");
?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="CSS/theme.css"/>
<link rel="stylesheet" href="CSS/profile1.css"/>
<script type="text/javascript" src="JQ/jquery-2.2.1.min.js"></script>

  <title>biblioweb</title>
</head>

<body>




<div class="jumbotron">
      <div class="col-lg-8">
          <span class="biblio-logo">Biblioweb<span class="dot">.JBF</span></span>
      </div>
      <div class="col-lg-4">
          <div id="logoright">Bibliotheque du web</div>
      </div>
</div>
<div class="col-lg-3">
<nav id="navigation">
  <ul>
    <li><a href="profil.php"><i class="ion-ios-speedometer-outline"></i><span>Dashboard</span></a></li>
    <li><a href="index.php"><i class="ion-ios-speedometer-outline"></i><span>Accueil</span></a></li>
    <li><a href="messages.php"><i class="ion-email"></i><span>Messages</span></a></li>
    <li><a href="modification.php"><i class="ion-gear-a"></i><span>Modification</span></a></li>
    <li><a href="index.php?d=true" ><i class="ion-log-out"></i><span>Logout</span></a></li>
  </ul>
</nav>
</div>
<div class="col-lg-9">
<div class="tableau">

<div class="panel panel-default">

  <div class="panel-heading">MES MESSAGES </div>
  <div class="page-header">
  <h1><small><?php delai(); ?></small></h1> 
</div>
    
  </div>
</div>
</div>
<div class="col-lg-12">
<footer class="footer">
<?php include('composant/footer.php');?>
</footer>
</div>

</body>
</html>


<?php
function delai()
{

  $cli=new Client();
  $res=$cli->livre_emprunt($_SESSION['id_client']);

  foreach ($res as $emprunt) 
  {

  $z=$emprunt['date_emprunt'];
  $DateFin=8;
  $DateDebut = date("$z");
  $DateFin = date('Y-m-d', strtotime($DateDebut.' +'.$DateFin.' days'));


  if($DateFin < date('Y-m-d'))
    {
    echo 'Vous avez dépassé le date du retour du livre  ' .$emprunt['ISBN'].' .<br/>';
    }
  else
    {

    }
  }
}
 



?>