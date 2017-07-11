<?php

require_once('connexion.php');

class Livre extends Connexion {

	private $table = "livre";

	public function afficher($var,$next,$nex){
		$livre = array();
		$sql="SELECT DISTINCT * 
		FROM livre l
		JOIN ecrire e 
		ON e.ISBN = l.ISBN 
		JOIN auteur a 
		ON a.id_auteur = e.id_auteur 
		WHERE l.titre_livre LIKE '%$var%' OR l.type_livre LIKE '%$var%' OR a.nom_auteur LIKE'%$var%' 
        GROUP BY l.ISBN
		ORDER BY l.ISBN 
		LIMIT $next,$nex";
		$connex=new Connexion();
		$req=$connex->getPDO()->query($sql);
		while($data = $req->fetch()){
				$livre[]=$data;
			}
			return $livre;
	}
	public function afficher_infolivre($isbn){
		$livre =array();
		$sql="SELECT * FROM livre WHERE ISBN='$isbn'";
		$connex=new Connexion();
		$req=$connex->getPDO()->query($sql);
		$livre[]=$req->fetch();
		return $livre;

	}
	public function afficher_info_auteur($isbn){
		$auteur=array();
		$sql="SELECT * FROM ecrire e JOIN auteur a
		ON e.id_auteur=a.id_auteur
		WHERE e.ISBN='$isbn'";
		$connex=new Connexion();
		$req=$connex->getPDO()->query($sql);
		while($data = $req->fetch()){
				$auteur[]=$data;
			}
			return $auteur;
	}



	public function next($limit1,$limit2){
		$limit1=$limit1+6;
		$limit2=$limit2+6;

	}

	public function previous($limit1,$limit2){
		$limit1=$limit1-6;
		$limit2=$limit2-6;
	}







}











	?>