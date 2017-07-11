

<?php
//definition pour les emprunt et definition pour l'utilisateur
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

  <div class="panel-heading">MES EMPRUNTS </div>
  <div class="panel-body">
  
  </div>
  <table class="table">


<tr><th>Code</th><th>Nom livre</th><th>Type de livre</th><th>Date Emprunt</th><th>Date de retour</th></tr>

<?php

$client1=new Client();
$resulta=$client1->livre_emprunt($_SESSION['id_client']);
foreach ($resulta as $emprunt) {

$z=$emprunt['date_emprunt'];
$DateFin=8;
$DateDebut = date("$z");
$DateFin = date('Y-m-d', strtotime($DateDebut.' +'.$DateFin.' days'));
  echo "<tr><td>".$emprunt['ISBN']."</td><td>".$emprunt['titre_livre']."</td><td>".$emprunt['type_livre']."</td><td>".$emprunt['date_emprunt']."</td><td>".$DateFin."</td></tr>";
}
?>
    
  </table>
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