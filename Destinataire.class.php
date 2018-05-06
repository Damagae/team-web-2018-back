<?php
require_once 'MyPDO.imac-flower.include.php'; 


/**
 * Classe Destinataire
 */

class Destinataire {

	/***********************ATTRIBUTS***********************/
	
	// Numero du bouquet
	private $numDes = null;
	//ville
	private $ville = null; 
	
	// message
	private $message = null;

	// nom
	private $nom = null;
	
	//adresse
	private $adresse = null;
	

	/*********************CONSTRUCTEURS*********************/
	
	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Bouquet à partir d'un numDes (via la bdd)
	 * @param int $numDes identifiant du bouquet à créer (bdd)
	 * @return Destinataire instance correspondant à $numDes 
	 * @throws Exception s'il n'existe pas cet $numDes  dans a bdd
	 */
	
	public static function createFromnumDes($numDes ){
		// TO DO
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM Destinataire WHERE numDes = :numDes ");
        $stmt->bindValue(':numDes ',$numDes );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Destinataire");
        if (($object = $stmt->fetch()) !== false)
            return $object;
        else
            throw new Exception("Error");
	}

	/********************GETTERS SIMPLES********************/
	
	/**
	 * Getter sur le numéro de bouquet
	 * @return int $numDes 
	 */
	public function getnumDes() {
		return $this->numDes ;
	}
	
	/**
	 * Getter sur l'état
	 * @return string $ville
	 */
	public function getEtat() {
		return $this->ville;
	}

	/**
	 * Getter sur la taille
	 * @return string $taille
	 */
	public function getTaille() {
		return $this->taille;
	}

	/**
	 * Getter sur la message 
	 * @return string $message
	 */
	public function getmessage() {
		return $this->message;
	}

	/**
	 * Getter sur le nom 
	 * @return string $nom
	 */
	public function getnom() {
		return $this->nom;
	}

	/**
	 * Getter sur la adresse
	 * @return string $adresse
	 */
	public function getadresse() {
		return $this->adresse;
	}	



	


	/*******************GETTERS COMPLEXES*******************/

	