<?php
require_once 'MyPDO.imac-flower.include.php'; 


/**
 * Classe Bouquet
 */

class Bouquet {

	/***********************ATTRIBUTS***********************/
	
	// Numero du bouquet
	private $numBou = null;
	// Taille
	private $taille = null;
	// Prix
	private $prix = null;
	//Photo
	private $photo = null;
	//Etat
	private $etat = null; 
	// popularite
	private $popularite = null;

	/*********************CONSTRUCTEURS*********************/
	
	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Bouquet à partir d'un numBou (via la bdd)
	 * @param int $numbouquet identifiant du bouquet à créer (bdd)
	 * @return Bouquet instance correspondant à $numBou 
	 * @throws Exception s'il n'existe pas cet $numBou  dans a bdd
	 */

	public static function createFromnumBou($numBou ){
		// TO DO
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM Bouquet WHERE numBou = :numBou ");
        $stmt->bindValue(':numBou ',$numBou );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Bouquet");
        if (($object = $stmt->fetch()) !== false)
            return $object;
        else
            throw new Exception("Error");
	}

	/********************GETTERS SIMPLES********************/
	
	/**
	 * Getter sur le numéro de bouquet
	 * @return int $numBou 
	 */
	public function getNumBou() {
		return $this->numBou ;
	}

	/**
	 * Getter sur la taille
	 * @return string $taille
	 */
	public function getTaille() {
		return $this->taille;
	}

	/**
	 * Getter sur le prix 
	 * @return string $prix
	 */
	public function getPrix() {
		return $this->prix;
	}

	/**
	 * Getter sur la photo
	 * @return string $photo
	 */
	public function getPhoto() {
		return $this->photo;
	}	

	/**
	 * Getter sur l'état
	 * @return string $etat
	 */
	public function getEtat() {
		return $this->etat;
	}

	/**
	 * Getter sur la popularité
	 * @return string $popularité
	 */
	public function getPopularite() {
		return $this->popularite;
	}


	/*******************GETTERS COMPLEXES*******************/

	