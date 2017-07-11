<?php

session_start();
include("modele/Client.php");
  if(!isset($_SESSION['connecter'])) 
  $_SESSION['connecter']=false;
   
   ?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="CSS/theme.css"/>
<link rel="stylesheet" href="CSS/profile1.css"/>
<link rel="stylesheet" href="CSS/bib.css"/>
<script type="text/javascript" src="JQ/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="JS/bib.js"></script>
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

      <li><a href="reglement.php" >Reglement</a></li>
   
      <li class="active"><a href="bibliotheque.php" >La bibliotheque</a></li>
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
      <li class="active" ><a href="profil.php" >Profile</a></li>
      <li><a href="index.php?d=true" >Deconnecter</a></li>
 
  </ul>

</div>

<?php

}
?>

    </div> 
</div>
<div class="col-lg-12">
<div class="tableau">

<div class="panel panel-default">

 <div class="container">
    <div id="ninja-slider">
      <div class="slider-inner">
        <ul>
          <li><img class="ns-img" src="IMG/im1.jpg"></li>
          <li><img class="ns-img" src="IMG/im2.jpg"></li>
          <li><img class="ns-img" src="IMG/im3.jpg"></li>
          <li><img class="ns-img" src="IMG/im4.jpg"></li>
        </ul>
      </div>
    </div>
  </div>
        <script type="text/javascript">
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/player_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('ytplayer', {
                events: {
                    'onReady': onPlayerReady
                }
            });
        }

        function onPlayerReady() {
            player.playVideo();
            // Mute!
            player.mute();
        }
        </script>
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
