

<?php

session_start();

include("modele/Client.php");
include("modele/Livre.php");



if(isset($_GET['passer'])){

if($_GET['passer']=='next'){
$_SESSION['next']=$_SESSION['next']+6;
$_SESSION['nex']=$_SESSION['nex']+6;
}else{
  if($_GET['passer']=='previous'){
  $_SESSION['next']=$_SESSION['next']-6;
$_SESSION['nex']=$_SESSION['nex']-6;
}

}
}


//la verfication de variable session et et verfier resevoir la variable b
if(isset($_SESSION['connecter'])){ 
  if(isset($_GET['d'])){
      session_destroy();
      $_SESSION['connecter']=false;
    }
}

//si n'y a pas la variable de connecter alors connecter est false
if(!isset($_SESSION['connecter'])) 
  $_SESSION['connecter']=false; 
   
//pour lad conexion je dois verfier dans la premier temps est ce que j'ai les variable 
if(!empty($_POST['email']) AND !empty($_POST['pwd'])) 
{
   $client1=new Client();
//la fonction valide pour chercher est-ce que ce client existe
   if($client=$client1->valide($_POST['email'],$_POST['pwd'])){

    $_SESSION['connecter']=true;
    foreach ($client as $client_connecter) {
    //stocke tt les variable dans session pour travaille dans tous les page
    $_SESSION['id_client']=$client_connecter['id_client'];
    $_SESSION['nom_client']=$client_connecter['nom_client'];
    $_SESSION['Email']=$client_connecter['Email'];
    $_SESSION['date_naissance']=$client_connecter['date_naissance'];
    $_SESSION['adresse']=$client_connecter['adresse'];
    $_SESSION['MDP']=$client_connecter['MDP'];
    $_SESSION['Nb_emprunt']=$client_connecter['Nb_emprunt'];
    $_SESSION['Date_inscription']=$client_connecter['Date_inscription'];
     }
  
    }else{

?>      
    <script type="text/javascript"> window.alert('email ou mot de passe incorrect! ');</script>
<?php
    
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="CSS/theme.css"/>
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

<div class="col-lg-6">
  <ul class="nav nav-pills nav1">
            <li class="active"><a href="index.php">Acceuil</a></li>
   <?php 
 
  if(!$_SESSION['connecter']){//si connecter il n,affiche pas else il affiche
  ?>
           <li><a href="inscription.php">Inscription</a></li>
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
        <form method="post" action="" > 
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

<?php
include('composant/menu.php');
?>

  <div class="col-lg-9">
  <h2> Acceuil</h2>
    <div class="panel panel-default panel2">
      <div class="panel-heading">Page d'Acceuil</div>
      <div class="panel-body">
        <div class="row">
          

<?php
$liv = new Livre();


if(isset($_GET['passer']) AND $_GET['passer']=='next'){
$liv->next($_SESSION['next'],$_SESSION['nex']);
}else{ 
  if(isset($_GET['passer']) AND $_GET['passer']=='previous'){
$liv->previous($_SESSION['next'],$_SESSION['nex']);

  }else{

    $_SESSION['next']=0;
    $_SESSION['nex']=6;
  }
}

if(empty($_GET['chercher'])){
$_GET['chercher']="Roman";
}

$leslivre = $liv->afficher($_GET['chercher'],$_SESSION['next'],$_SESSION['nex']);
$annule_next=0;
 foreach($leslivre as $livre){

?>
            <div class="col-sm-6 col-md-4 book1">
              <div class="thumbnail height">
                <?php echo '<img src='.$livre['img_livre'].' alt="" />'; ?>
                    
                <div class="caption">
                 <h2><?php echo $livre['titre_livre'] ?></h2>
                    <p><?php echo $livre['Paragraphe'] ?>"</p>
                  
                  <p><a href="consultation.php?ISBN=<?php echo $livre['ISBN'] ?>" class="btn btn-primary" role="button">Consulter</a> <?php if($_SESSION['connecter']==true && $livre['etat']==0 ){?><a href="consultation.php?ISBN=<?php echo $livre['ISBN'] ?>" class="btn btn-default" role="button">emprunter</a>
                      
                    
                      
                      
                      <?php } ?></p>
                </div>
              </div>
            </div>
           
<?php $annule_next++;} ?>

          </div>
      
            <ul class="pager">

    <?php if($_SESSION['next']!=0){ ?>
              <li><a href="index.php?chercher=<?php echo $_GET['chercher']; ?>&passer=previous">Previous</a></li>

              <?php } 
              if($annule_next>=6){ 
                ?>
              <li><a href="index.php?chercher=<?php echo $_GET['chercher']; ?>&passer=next">Next</a></li>
             <?php } ?>
            </ul>
      </div>
    </div>
  </div>
</div>


<?php
include('composant/footer.php');

?>


</body>
</html>










