<?php
require_once 'MyPDO.imac-flower.include.php'; 


/**
 * Classe Client
 */

class Client {

	/***********************ATTRIBUTS***********************/
	
	// Numero du Client
	private $numCli = null;
	// mail
	private $mail = null;
	//nom
	private $nom = null;
	//club
	private $club = null; 

	/*********************CONSTRUCTEURS*********************/
	
	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Client à partir d'un numCli (via la bdd)
	 * @param int $numCli identifiant du Client à créer (bdd)
	 * @return Client instance correspondant à $numCli 
	 * @throws Exception s'il n'existe pas cet $numCli  dans a bdd
	 */

	public static function createFromnumCli($numCli ){
		// TO DO
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM Client WHERE numCli = :numCli ");
        $stmt->bindValue(':numCli ',$numCli );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Client");
        if (($object = $stmt->fetch()) !== false)
            return $object;
        else
            throw new Exception("Error");
	}

	/********************GETTERS SIMPLES********************/
	
	/**
	 * Getter sur le numéro de Client
	 * @return int $numCli 
	 */
	public function getnumCli() {
		return $this->numCli ;
	}

	/**
	 * Getter sur le mail 
	 * @return string $mail
	 */
	public function getmail() {
		return $this->mail;
	}

	/**
	 * Getter sur la nom
	 * @return string $nom
	 */
	public function getnom() {
		return $this->nom;
	}	

	/**
	 * Getter sur l'état
	 * @return string $club
	 */
	public function getclub() {
		return $this->club;
	}

	}


	/*******************GETTERS COMPLEXES*******************/

	