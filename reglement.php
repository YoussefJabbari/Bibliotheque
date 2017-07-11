<?php
session_start();

include("modele/Client.php");
if(!isset($_SESSION['connecter'])) 
  $_SESSION['connecter']=false; //pour la premier fois 
   

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="CSS/theme.css"/>


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
<div class="col-lg-6">
  <ul class="nav nav-pills">
            <li><a href="index.php">Acceuil</a></li>
       <?php 


  if(!$_SESSION['connecter']){
  ?>
      <li><a href="inscription.php">Inscription</a></li>
    <?php
  }
    ?> 

      <li class="active"><a href="reglement.php">Reglement</a></li>

      <li><a href="bibliotheque.php" >La bibliotheque</a></li>
  </ul>
</div>

<div class="col-lg-6">
 <div id="iscri">
  <?php 
  if(!$_SESSION['connecter']){
  ?>
        <form method="post" action="index.php" > 
            <input type="text" name="email" placeholder="Email ou Username" required />
            <input type="password" name="pwd" placeholder="Password" required />
            <input type="submit" value="Login"/>
        </form>  
      
    <?php
  }else{
    ?> 

 <div class="col-lg-7">
 </div>
 <div class="col-lg-5">
 <ul class="nav nav-pills">
      <li class="active"><a href="profil.php" >Profile</a></li>
      <li><a href="index.php?d=true" >Deconnecter</a></li>
 
  </ul>

</div>

<?php

}

?>

    </div> 
</div>



<div class="row">


  <div class="col-lg-12">

<div class="panel panel-warning panel1">
  <div class="panel-heading">Regles de pret</div>
  <div class="panel-body">
  <div id="reglement_ecrire">
	<h2>Regles de pret</h2>
		<ul>
			<li>Tout adhérent a le droit d’emprunter 1 à 10 emprunts  des collections de la Bibliothèque pendant 8 jours ouvrables en plus d’un document de la Section romans .</li>
			<li>La bibliothèque se réserve le droit d’exclure certains documents du prêt.</li>
			<li>Tout retard sera sanctionné par une amende (3dh/jour).</li>
			<li>Tout document perdu ou abimé devra être remplacé ou remboursé.</li>
		</ul>

	<h2>Modalité de prêt</h2>
		<ul>
			<li>Pour toute opération de prêt, les étudiants de l’Université Hassan II de Casablanca sont tenus de déposer leur carte de d’étudiant au guichet de prêt.</li>
			<li>La carte sera récupérée une fois le livre rendu.</li>
		</ul>
	<h2>Compte lecteur</h2>
		<ul>
			<li>Pour connaître la situation des prêts en cours, retards, amendes, faire des propositions d’achat, etc., la bibliothèque met à la disposition des adhérents un compte lecteur accessible sur la page d’accueil du catalogue de la bibliothèque.</li>
		</ul>
    <h2>Compte lecteur</h2>
    <ul>
      <li>Pour connaître la situation des prêts en cours, retards, amendes, faire des propositions d’achat, etc., la bibliothèque met à la disposition des adhérents un compte lecteur accessible sur la page d’accueil du catalogue de la bibliothèque.</li>
    </ul>
</div>
</div>
</div>

      
  </div>
</div>
<?php

include('composant/footer.php');
?>
</body>
</html>



