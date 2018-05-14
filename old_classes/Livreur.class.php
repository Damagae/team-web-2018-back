<?php
require_once 'MyPDO.imac-flower.include.php'; 


/**
 * Classe Livreur
 */

class Livreur {

	/***********************ATTRIBUTS***********************/
	
	// Numero du Livreur
	private $numLiv = null;
	// modeLivraison
	private $modeLivraison = null;
	//etat
	private $etat = null;
		/*********************CONSTRUCTEURS*********************/
	
	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Livreur à partir d'un numLiv (via la bdd)
	 * @param int $numLiv identifiant du Livreur à créer (bdd)
	 * @return Livreur instance correspondant à $numLiv 
	 * @throws Exception s'il n'existe pas cet $numLiv  dans a bdd
	 */

	public static function createFromnumLiv($numLiv ){
		// TO DO
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM Livreur WHERE numLiv = :numLiv ");
        $stmt->bindValue(':numLiv ',$numLiv );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Livreur");
        if (($object = $stmt->fetch()) !== false)
            return $object;
        else
            throw new Exception("Error");
	}

	/********************GETTERS SIMPLES********************/
	
	/**
	 * Getter sur le numéro de Livreur
	 * @return int $numLiv 
	 */
	public function getnumLiv() {
		return $this->numLiv ;
	}

	/**
	 * Getter sur le modeLivraison 
	 * @return string $modeLivraison
	 */
	public function getmodeLivraison() {
		return $this->modeLivraison;
	}

	/**
	 * Getter sur l'etat
	 * @return string $etat
	 */
	public function getetat() {
		return $this->etat;
	}	



	/*******************GETTERS COMPLEXES*******************/

	