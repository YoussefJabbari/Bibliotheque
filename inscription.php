<?php
session_start();


include("modele/Client.php");

if(!isset($_SESSION['connecter'])) 
  $_SESSION['connecter']=false; 


if(!empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['nom']) AND !empty($_POST['datenaissance']) AND !empty($_POST['addresse'])){

  $client=new Client();
    try
    {
        if(1)
        {
            $client->inscription($_POST['nom'],$_POST['username'],$_POST['datenaissance'],$_POST['addresse'],$_POST['password']);
        }
        else
        {
            throw new Exception('Un probleme est produit lors de votre inscription!!! Merci de ressayer plus tard ^_^');
        }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}

?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="CSS/theme.css"/>
<script type="text/javascript"></script>
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
      <li class="active"><a href="inscription.php">Inscription</a></li>
    <?php
  }
    ?> 

      <li><a href="reglement.php" >Reglement</a></li>
      
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
      <li  class="active"><a href="profil.php" >Profile</a></li>
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




<div class="panel panel-success panel1" >
  <div class="panel-heading">Inscription</div>
  <div class="panel-body">
    <fieldset>
	<legend><b>Inscripton Individuelle</b></legend>


    	<form action="inscription.php" method="post">
		<table class="login_table">
		<tr>
		<td>Email<span>*</span></td>
		<td><input type="text" name="username" id="username" placeholder="email or username" required></td>
		</tr>
		<tr>
		<td>Pasword<span>*</span></td>
		<td><input type="password" name="password" id="password" placeholder="password" required></td>
		</tr>
		<tr>
		<td>Nom<span>*</span></td>
		<td><input type="text" name="nom" id="nom" placeholder="Nom" required></td>
		</tr>
		<tr>
		<td>Date-naissance<span>*</span></td>
		<td><input type="date" name="datenaissance" id="datenaissance" placeholder="AAAA-MM-JJ" required></td>
		</tr>
		<tr>
		<td>adresse <span>*</span></td>
		<td><input type="text" name="addresse" id="addresse" placeholder="Adresse" required></td>
		</tr>
		<tr>
		<td> <small>Keep Me</small><input type="checkbox" name="keep" value="true"></td>
		<td><input type="submit" value="Inscription"/><input type="reset" value="repeter"/></td>
		</tr>
		</table>
	</form>

</fieldset>

<div id="reglement_ecrire"><h2>Carte « Adhérent »</h2>
<ul><li> Une carte « Adhérent » sera délivrée aux usagers n’appartenant pas à l’Université Hassan II de Casablanca. Cette carte doit être présentée à chaque visite de la bibliothèque et est obligatoire pour toute opération de prêt.</li></ul>

    </div>
  </div>
</div>
     
  </div>
</div>
<?php
include('composant/footer.php')
?>
</body>
</html>




