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

<div class="panel panel-success">
  <div class="panel-heading">Modofication</div>
  <div class="panel-body">
    <fieldset>
  <legend><b>Modification mes information</b></legend>


      <form action="" method="post">
    <table class="login_table">
    <tr>
    <td>Username<span>*</span> :</td>
    <td><input type="text" name="username" id="username" value=<?php echo $_SESSION['Email'] ?> onclick="this.value='' " required></td>
    </tr>
    <tr>
    <td>Pasword<span>*</span></td>
    <td><input type="password" name="password" id="password" value=<?php echo $_SESSION['MDP'] ?> onclick="this.value='' " required></td>
    </tr>
    <tr>
    <td>Nom<span>*</span></td>
    <td><input type="text" name="nom" id="nom" value=<?php echo $_SESSION['nom_client'] ?> onclick="this.value='' " required></td>
    </tr>
    <tr>
    <td>Date-naissance<span>*</span></td>
    <td><input type="date" name="datenaissance" id="datenaissance" value=<?php echo $_SESSION['date_naissance'] ?> onclick="this.value='' " required></td>
    </tr>
    <tr>
    <td>adresse <span>*</span></td>
    <td><input type="text" name="addresse" id="addresse" value=<?php echo $_SESSION['adresse'] ?> onclick="this.value='' " required></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" value="modifier"> <input type="reset" value="repeter"/></td>
    </tr>
    </table>
  </form>

</fieldset>
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

if(!empty($_SESSION['id_client']) AND !empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['nom']) AND !empty($_POST['datenaissance']) AND !empty($_POST['addresse'])){

  $client=new Client();
 $client->modification($_SESSION['id_client'],$_POST['nom'],$_POST['username'],$_POST['datenaissance'],$_POST['addresse'],$_POST['password']);
    $_SESSION['nom_client']=$_POST['nom'];
    $_SESSION['Email']=$_POST['username'];
    $_SESSION['date_naissance']=$_POST['datenaissance'];
    $_SESSION['adresse']=$_POST['addresse'];
    $_SESSION['MDP']=$_POST['password'];

}

?>