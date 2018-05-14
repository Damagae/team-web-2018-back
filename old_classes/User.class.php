<?php
require_once 'MyPDO.imac-flower.include.php'; 


/**
 * Classe User
 */

class User {

	/***********************ATTRIBUTS***********************/
	
	// Numero du User
	private $numUser = null;
	// mdp
	private $mdp = null;
	// mail
	private $mail = null;
	//nom
	private $nom = null;
	//nomMag
	private $nomMag = null; 

	/*********************CONSTRUCTEURS*********************/
	
	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de User à partir d'un numUser (via la bdd)
	 * @param int $numUser identifiant du User à créer (bdd)
	 * @return User instance correspondant à $numUser 
	 * @throws Exception s'il n'existe pas cet $numUser  dans a bdd
	 */

	public static function createFromnumUser($numUser ){
		// TO DO
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM User WHERE numUser = :numUser ");
        $stmt->bindValue(':numUser ',$numUser );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
        if (($object = $stmt->fetch()) !== false)
            return $object;
        else
            throw new Exception("Error");
	}

	/********************GETTERS SIMPLES********************/
	
	/**
	 * Getter sur le numéro de User
	 * @return int $numUser 
	 */
	public function getnumUser() {
		return $this->numUser ;
	}

	/**
	 * Getter sur la mdp
	 * @return string $mdp
	 */
	public function getmdp() {
		return $this->mdp;
	}

	/**
	 * Getter sur le mail 
	 * @return string $mail
	 */
	public function getmail() {
		return $this->mail;
	}

	/**
	 * Getter sur le nom
	 * @return string $nom
	 */
	public function getnom() {
		return $this->nom;
	}	

	/**
	 * Getter sur l'état
	 * @return string $nomMag
	 */
	public function getnomMag() {
		return $this->nomMag;
	}

	}


	/*******************GETTERS COMPLEXES*******************/

	