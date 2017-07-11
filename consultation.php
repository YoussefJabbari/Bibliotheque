<?php
session_start();


if(!isset($_SESSION['connecter'])){
  $_SESSION['connecter']=false;
}
include("modele/Client.php");
include("modele/Livre.php"); 

$livreinfo = new Livre();
$client1 = new Client();
$unSeulLivre=$livreinfo->afficher_infolivre($_GET['ISBN']);
foreach ($unSeulLivre as $livre) {
}

if(isset($_POST['emprunter'])){
    
  if($_SESSION['Nb_emprunt']<10 ){

     $_SESSION['Nb_emprunt']++;
     $livre['etat']=1;
     $client1->emprunter_Livre($_GET['ISBN'],$_SESSION['id_client'],$_SESSION['Nb_emprunt']);
     
    }else{
?>      
    <script type="text/javascript"> window.alert('vous etes a la limite, vous ne pouvez plus emprunter');</script>
<?php   }} ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="CSS/theme.css"/>
<link rel="stylesheet" href="CSS/consultation.css"/>
<script type="text/javascript"></script>
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

<div class="border_page">
	<h2>Livre</h2>
	<hr>
<div class="row">
  <div class="col-sm-6 col-md-4 img-livre">
    <div class="thumbnail">
       <?php echo '<img src='.$livre['img_livre'].' alt="" />'; ?>
    </div>
  </div>

    <div class="col-sm-6 col-md-4 paragraphe">
    <div class="thumbnail paragraphe-livre">
      <div class="caption">
        <h3 class="nom-livre"><?php echo $livre['titre_livre']; ?></h3>
        <p><?php echo $livre['Paragraphe']; ?></p>
        <p><a href="index.php?chercher=<?php echo $livre['type_livre'] ?>" class="btn btn-primary" role="button">Retour</a> 

        <?php if($_SESSION['connecter']==true){ if($livre['etat']==0){ ?>
            
            <form method="post" action="">
                    
            <input class="btn btn-default" name="emprunter" type="submit" value="Emprunter" />       
                    
            </form>
            
            <?php }} ?></p>
      </div>
    </div>
    <div class="panel panel-default">
    <table class="table">
    <tr><th>ISBN</th><th>EMPLACEMENT</th><th>ETAT</th></tr>
 <tr><td><?php echo $livre['ISBN']; ?></td><td><?php echo $livre['Emplacement'] ?></td><td><?php if($livre['etat']==1){ echo "Deja emprunte";}else{ echo "Disponible"; } ?></td></tr>
    </table>
    </div>
  </div>
</div>
<div>
<div class="row">
<?php
$lesauteur=$livreinfo->afficher_info_auteur($_GET['ISBN']);
foreach ($lesauteur as $auteur) {
?>
 <div class="col-sm-6 col-md-4 img-auteur">
   <h3 class="nom-livre">Auteur</h3>
    <div class="thumbnail">
      <?php echo '<img src='.$auteur['img_auteur'].' alt="" />'; ?>
       <div class="caption">
        <h3><?php echo $auteur['nom_auteur']." ".$auteur['prenom_auteur']; ?></h3>
        </div>
    </div>
  </div>
  <?php
}
  ?>
</div>
</div>
</div>
<?php include('composant/footer.php'); ?>
</body>
</html>
