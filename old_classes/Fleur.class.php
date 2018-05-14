<?php
require_once 'MyPDO.imac-flower.include.php'; 


/**
 * Classe Fleur
 */

class Fleur {

	/***********************ATTRIBUTS***********************/
	
	// Numero du bouquet
	private $nomFleu = null;
	//nom
	private $nom = null; 
	
	// stockFleu
	private $stockFleu = null;

	// nbFleu
	private $nbFleu = null;
	
	//etat
	private $etat = null;
	

	/*********************CONSTRUCTEURS*********************/
	
	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Bouquet à partir d'un nomFleu (via la bdd)
	 * @param int $nomFleuquet identifiant du bouquet à créer (bdd)
	 * @return Fleur instance correspondant à $nomFleu 
	 * @throws Exception s'il n'existe pas cet $nomFleu  dans a bdd
	 */
	
	public static function createFromnomFleu($nomFleu ){
		// TO DO
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM Fleur WHERE nomFleu = :nomFleu ");
        $stmt->bindValue(':nomFleu ',$nomFleu );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Fleur");
        if (($object = $stmt->fetch()) !== false)
            return $object;
        else
            throw new Exception("Error");
	}

	/********************GETTERS SIMPLES********************/
	
	/**
	 * Getter sur le numéro de bouquet
	 * @return int $nomFleu 
	 */
	public function getnomFleu() {
		return $this->nomFleu ;
	}
	
	/**
	 * Getter sur l'état
	 * @return string $nom
	 */
	public function getnom() {
		return $this->nom;
	}

	/**
	 * Getter sur la taille
	 * @return string $taille
	 */
	public function getTaille() {
		return $this->taille;
	}

	/**
	 * Getter sur la stockFleu 
	 * @return string $stockFleu
	 */
	public function getstockFleu() {
		return $this->stockFleu;
	}

	/**
	 * Getter sur le nbFleu
	 * @return string $nbFleu
	 */
	public function getnbFleu() {
		return $this->nbFleu;
	}

	/**
	 * Getter sur l'etat
	 * @return string $etat
	 */
	public function getetat() {
		return $this->etat;
	}	



	


	/*******************GETTERS COMPLEXES*******************/

	