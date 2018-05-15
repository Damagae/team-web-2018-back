/*TABLE */

CREATE TABLE Bouquet(
	numBou int primary key,
	taille int NOT NULL,
	prix float NOT NULL,
	photo varchar(2083), /*2083 carac max dun url sinon on peut utiliser text*/
	etat varchar(30),
	popularite int
);

CREATE TABLE Commande(
	numCom int primary key,
	prixtotal int,
	etat varchar(20) NOT NULL,
	dateCommande date NOT NULL,
	dateLivraison date NOT NULL,
	photo varchar(2083) /*2083 carac max dun url sinon on peut utiliser text*/
);

CREATE TABLE Client(
	numCli int primary key,
	mail varchar(320) NOT NULL, /*320 carac max pour une adresse mail sinon on peut utiliser text*/
	nom varchar(30) NOT NULL,
	club boolean NOT NULL /*Club: s il est dans le club 1/0 (réduc?)*/
);

CREATE TABLE Destinataire(
	numDes int primary key,
	ville int NOT NULL, /*Les villes sont des codes postaux*/
	message varchar(200),
	nom varchar(30) NOT NULL,
	adresse varchar(100)
);

CREATE TABLE Livreur(
	numLiv int primary key,
	modeLivraison varchar(20) NOT NULL, /*Mode de livraison = {livreur, poste}*/
	etat varchar(30)
);

CREATE TABLE User(
	numUser int primary key,
	mdp varchar(30),
	mail varchar(320) NOT NULL,
	nom varchar(30),
	nomMag varchar(30)
);

CREATE TABLE Fleur(
	nomFleu int primary key,
	nom varchar(30),
	stockFleu int NOT NULL, /*nb de graines en stock*/
	nbFleu int NOT NULL, /*nb de fleurs en stock*/
	etat varchar(30) /*etat des fleurs en croissance (prete, en pousse, plantée..)*/
);



/*////////////////
//// LES RELATIONS
////////////////*/

CREATE TABLE compose(
	numBou int,
	numFleu int,
	constraint cle_prim1 primary key (numBou, numFleu)
);


CREATE TABLE passe(
	numCli int,
	numCom int,
	constraint cle_prim2 primary key (numCli, numCom)
);


CREATE TABLE concerne(
	numDes int,
	numCom int,
	constraint cle_prim3 primary key (numDes, numCom)
);

CREATE TABLE constitue(
	numBou int,
	numCom int,
	constraint cle_prim4 primary key (numBou, numCom)
);

CREATE TABLE controle(
	numCom int,
	numUser int,
	constraint cle_prim5 primary key (numCom, numUser)
);

CREATE TABLE livre(
	numCom int,
	numLiv int,
	constraint cle_prim6 primary key (numCom, numLiv)
);



INSERT INTO Bouquet(numBou,taille, prix, photo, etat, popularite) VALUES (12313131, 10, 20, 'roses.jpg','livrée',5);
INSERT INTO Bouquet(numBou,taille, prix, photo, etat, popularite) VALUES (14443444, 20, 35, 'tulipes.jpg','prêt à l envoi',3);
INSERT INTO Bouquet(numBou,taille, prix, photo, etat, popularite) VALUES (32134442, 40, 60, 'tourn.jpg','prêt à l envoi',4);

INSERT INTO Commande(numCom, prixtotal, etat, dateCommande, dateLivraison, photo) VALUES (000001,232,'en cours','2016-11-11','2016-11-13',NULL);
INSERT INTO Commande(numCom, prixtotal, etat, dateCommande, dateLivraison, photo) VALUES (000002,12,'livrée','2016-11-16','2016-11-22',NULL);
INSERT INTO Commande(numCom, prixtotal, etat, dateCommande, dateLivraison, photo) VALUES (000003,98,'en cours','2018-05-16','2018-11-24',NULL);

INSERT INTO Client(numCli, mail, nom, club) VALUES (451367, 'michel58@gmail.com','Michel',false);
INSERT INTO Client(numCli, mail, nom, club) VALUES (689351, 'rachelle13@hotmail.com','Rousseau',true);
INSERT INTO Client(numCli, mail, nom, club) VALUES (441367, 'francois.dupont@yahoo.fr','Dupont',true);

INSERT INTO Destinataire(numDes, ville, message, nom, adresse) VALUES (2743155555, 77270,'Une pensée pour toi','Fautras','10 rue de la source');
INSERT INTO Destinataire(numDes, ville, message, nom, adresse) VALUES (1344567857, 93160,'Je n ai pas oublié...','Nguyen','12 allée Jean Jaures');
INSERT INTO Destinataire(numDes, ville, message, nom, adresse) VALUES (0000000000, 93161,'Jai oublié','Dark Vador','étoile noire');

INSERT INTO Livreur(numLiv, modeLivraison, etat) VALUES (412345,'chronopost','en cours');
INSERT INTO Livreur(numLiv, modeLivraison, etat) VALUES (548632,'chronopost','livrée');
INSERT INTO Livreur(numLiv, modeLivraison, etat) VALUES (548932,'livreur','0778421753');

INSERT INTO Fleur(nomFleu , nom, stockFleu, nbFleu, etat) VALUES(0451,'Rose',2,3,'plantée');
INSERT INTO Fleur(nomFleu , nom, stockFleu, nbFleu, etat) VALUES(1875,'Tournesol',0,3,'poussée');
INSERT INTO Fleur(nomFleu , nom, stockFleu, nbFleu, etat) VALUES(1976,'Tulipe',0,3,'plantée');

INSERT INTO User(numUser, mdp, mail, nom, nomMag)  VALUES (99999,'trolol','trolol@gmail.com', 'trolol', 'FlowerPower');
INSERT INTO User(numUser, mdp, mail, nom, nomMag)  VALUES (99998,'azerty','mail@gmail.com', 'Damien Trolar', 'Fleurs & co');

INSERT INTO Compose VALUES (12313131, 0451);
INSERT INTO Compose VALUES (14443444, 1976);
INSERT INTO Compose VALUES (32134442, 1875);

INSERT INTO Passe VALUES (451367, 000001);
INSERT INTO Passe VALUES (689351, 000002);
INSERT INTO Passe VALUES (441367, 000003);

INSERT INTO concerne VALUES (2743155555, 000001);
INSERT INTO concerne VALUES (1344567857, 000002);
INSERT INTO concerne VALUES (0000000000, 000003);

INSERT INTO constitue VALUES (12313131, 000001);
INSERT INTO constitue VALUES (14443444, 000002);
INSERT INTO constitue VALUES (32134442, 000003);

INSERT INTO controle VALUES (000001, 99999);
INSERT INTO controle VALUES (000002, 99998);
INSERT INTO controle VALUES (000003, 99998);

INSERT INTO livre VALUES (000001, 412345);
INSERT INTO livre VALUES (000002, 548632);
INSERT INTO livre VALUES (000003, 548932);
