<?php
require_once 'MyPDO.imac-flower.include.php'; 


/**
 * Classe Commande
 */

class Commande {

	/***********************ATTRIBUTS***********************/
	
	// Numero du bouquet
	private $numCom = null;
	//Etat
	private $etat = null; 
	
	// dateCommande
	private $dateCommande = null;

	// popularite
	private $popularite = null;
	
	//dateLivraison
	private $dateLivraison = null;
	

	/*********************CONSTRUCTEURS*********************/
	
	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Bouquet à partir d'un numCom (via la bdd)
	 * @param int $numComquet identifiant du bouquet à créer (bdd)
	 * @return Commande instance correspondant à $numCom 
	 * @throws Exception s'il n'existe pas cet $numCom  dans a bdd
	 */
	
	public static function createFromnumCom($numCom ){
		// TO DO
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM Commande WHERE numCom = :numCom ");
        $stmt->bindValue(':numCom ',$numCom );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Commande");
        if (($object = $stmt->fetch()) !== false)
            return $object;
        else
            throw new Exception("Error");
	}

	/********************GETTERS SIMPLES********************/
	
	/**
	 * Getter sur le numéro de bouquet
	 * @return int $numCom 
	 */
	public function getnumCom() {
		return $this->numCom ;
	}
	
	/**
	 * Getter sur l'état
	 * @return string $etat
	 */
	public function getEtat() {
		return $this->etat;
	}

	/**
	 * Getter sur la taille
	 * @return string $taille
	 */
	public function getTaille() {
		return $this->taille;
	}

	/**
	 * Getter sur la dateCommande 
	 * @return string $dateCommande
	 */
	public function getdateCommande() {
		return $this->dateCommande;
	}

	/**
	 * Getter sur la popularité
	 * @return string $popularité
	 */
	public function getPopularite() {
		return $this->popularite;
	}

	/**
	 * Getter sur la dateLivraison
	 * @return string $dateLivraison
	 */
	public function getdateLivraison() {
		return $this->dateLivraison;
	}	



	


	/*******************GETTERS COMPLEXES*******************/

	