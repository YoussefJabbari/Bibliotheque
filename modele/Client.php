<?php
include("Connexion.php");
class Client extends Connexion {

	private $_table = "client";

// la fonction de l'inscription //SYSDATE

		public function inscription($nom,$username,$datenaissance,$addresse,$password)
		{
			$sql="INSERT INTO {$this->_table} (nom_client,Email,date_naissance,adresse,MDP,Nb_emprunt,Date_inscription) VALUES ('$nom','$username','$datenaissance','$addresse','$password',0,NOW())";
			$req=$this->getPDO()->query($sql);
			
		}
    
    
//la fonction de authentification

		public function valide($email,$mdp)
		{

			$client = array();
			$sql="SELECT * FROM {$this->_table} WHERE Email='$email' AND MDP='$mdp'";
			$req=$this->getPDO()->query($sql);
			if($data = $req->fetch()){
				$client[] = $data; 
				return $client;
			}else{

				return false;
			}
		}



//la fontion qui permet d'afficher les livres empruntés maintenant par un client (id client) 

		public function livre_emprunt($idclient)

		{	$emprunt = array();

			$sql="SELECT * FROM emprunter e , livre l WHERE e.ISBN=l.ISBN AND e.id_client='$idclient' ";
			$connex=new Connexion();
			$req=$connex->getPDO()->query($sql);
			

			while($data = $req->fetch()){
				$emprunt[]=$data;
			}

			return $emprunt;
		}


//la fontion qui permet de modifier les informations d'un client

		public function modification($idclient,$nomclient,$email,$datenaissance,$adresse,$mdp)
		{
			$sql="UPDATE {$this->_table} SET nom_client=?,Email=?,date_naissance=?,adresse=?,MDP=?  WHERE id_client='$idclient'";
			$req=$this->getPDO()->prepare($sql);
			$req->execute(array($nomclient,$email,$datenaissance,$adresse,$mdp));
		}
//la fontion qui permet d'emprunter et d'incrementer lenombre d'emprunts si 

		public function emprunter_Livre($isbn,$idclient,$nbremp)
		{
			
			$sql1="UPDATE livre SET etat=1  WHERE ISBN='$isbn'";
			$req1=$this->getPDO()->query($sql1);
			$sql2="UPDATE client SET Nb_emprunt='$nbremp'  WHERE id_client='$idclient' ";
			$req2=$this->getPDO()->query($sql2);
			$sql3="INSERT INTO emprunter (id_client,ISBN,date_emprunt) VALUES($idclient,$isbn,NOW())";
			$req3=$this->getPDO()->query($sql3);
		}


}
?>