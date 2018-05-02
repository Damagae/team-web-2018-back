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

/*

INSERT INTO Bouquet(numBou, nombou, taille, prix) VALUES (278945, 'Roses', 86, 60.99, 'roses.jpg');
INSERT INTO Bouquet(numBou, nombou, taille, prix) VALUES (783456, 'Tulipes', 93,67.99, 'tulipes.jpg');
INSERT INTO Bouquet(numBou, nombou, taille, prix) VALUES (856349, 'Tournesol', 37,23, 'tourn.jpg');
INSERT INTO Bouquet(numBou, nombou, taille, prix) VALUES (184753, ' Chrysanthèmes', 58,40, 'chrys.jpg');
INSERT INTO Bouquet(numBou, nombou, taille, prix) VALUES (184847, 'Lys', 78.3,49.99, 'lys.jpg');
INSERT INTO Bouquet(numBou, nombou, taille, prix) VALUES (184847, 'Pivoines', 78.3,49.99, 'pivoines.jpg');



INSERT INTO Commande(numCom, etat, dateComande, dateLivraison) VALUES (45782134567,'en cours de livraison','2016-10-27','2016-11-01');
INSERT INTO Commande(numCom, etat, dateComande, dateLivraison) VALUES (43623432328,'prêt à l envoi','2016-11-18','2016-11-30');
INSERT INTO Commande(numCom, etat, dateComande, dateLivraison) VALUES (56789471658,'livré','2016-10-12','2016-10-22');
INSERT INTO Commande(numCom, etat, dateComande, dateLivraison) VALUES (35645625988,'en cours de livraison','2016-11-11','2016-11-13');
INSERT INTO Commande(numCom, etat, dateComande, dateLivraison) VALUES (36277777345,'en cours de livraison','2016-11-16','2016-11-22');

INSERT INTO Passer VALUES (36277777345, 745123);
INSERT INTO Passer VALUES (35645625988, 624864);
INSERT INTO Passer VALUES (56789471658, 451367);
INSERT INTO Passer VALUES (43623432328, 689351);
INSERT INTO Passer VALUES (45782134567, 451367);

INSERT INTO composer VALUES (278945, 36277777345);
INSERT INTO composer VALUES (783456, 35645625988);
INSERT INTO composer VALUES (856349, 56789471658);
INSERT INTO composer VALUES (856349, 43623432328);
INSERT INTO composer VALUES (184847, 45782134567);

INSERT INTO Concerner VALUES (2748799315, 36277777345);
INSERT INTO Concerner VALUES (1674567823, 35645625988);
INSERT INTO Concerner VALUES (2474123456, 56789471658);
INSERT INTO Concerner VALUES (1344567857, 43623432328);
INSERT INTO Concerner VALUES (2743155555, 45782134567);

INSERT INTO Client(numCli, mdp, mail, nom, club) VALUES (451367,'hey','michel58@gmail.com','Michel',false);
INSERT INTO Client(numCli, mdp, mail, nom, club) VALUES (689351,'superman','rachelle13@hotmail.com','Rousseau',true);
INSERT INTO Client(numCli, mdp, mail, nom, club) VALUES (451367,'jaime','francois.dupont@yahoo.fr','Dupont',true);
INSERT INTO Client(numCli, mdp, mail, nom, club) VALUES (624864,'azertyuiop','claude.bernad@gmail.com','Bernard',true);
INSERT INTO Client(numCli, mdp, mail, nom, club) VALUES (745123,'non','helene.chateau@gmail.com','Chateau',false);


INSERT INTO Destinataire(numDes, ville, messsage, nom, adresse) VALUES (2743155555, 77270,'Une pensée pour toi','Fautras','10 rue de la source');
INSERT INTO Destinataire(numDes, ville, messsage, nom, adresse) VALUES (1344567857, 93160,'Je n ai pas oublié...','Nguyen','12 allée Jean Jaures');
INSERT INTO Destinataire(numDes, ville, messsage, nom, adresse) VALUES (2474123456, 75016,NULL,'Fautras','8 rue de la liberté');
INSERT INTO Destinataire(numDes, ville, messsage, nom, adresse) VALUES (1674567823, 69000,'Une surprise ne vient jamais seule','Duval','14 rue des coquelicots');
INSERT INTO Destinataire(numDes, ville, messsage, nom, adresse) VALUES (2748799315, 62100,NULL,'Pourquoi la vie est-elle si courte, pourquoi la vie ? Tant de question et aucune réponse...','10 allée George Braque');


INSERT INTO Magasin(numMag, ville ) ( 3, 94150);
INSERT INTO Magasin(numMag, ville ) ( 4, 77500);
INSERT INTO Magasin(numMag, ville ) ( 1, 75018);
INSERT INTO Magasin(numMag, ville ) ( 6, 69230);
INSERT INTO Magasin(numMag, ville ) ( 3, 59000);


INSERT INTO CodePostal(codePost, Modelivraison) VALUES ( 94150,'chronopost');
INSERT INTO CodePostal(codePost, Modelivraison) VALUES ( 77500,'chronopost');
INSERT INTO CodePostal(codePost, Modelivraison) VALUES ( 75014,'livreur');
INSERT INTO CodePostal(codePost, Modelivraison) VALUES ( 69230,'chronopost');
INSERT INTO CodePostal(codePost, Modelivraison) VALUES ( 59000,'livreur');


INSERT INTO Livraison(numLiv, typeLiv, tel, nom) VALUES (412345,'chronopost',NULL,NULL);
INSERT INTO Livraison(numLiv, typeLiv, tel, nom) VALUES (548632,'chronopost',NULL,NULL);
INSERT INTO Livraison(numLiv, typeLiv, tel, nom) VALUES (548632,'livreur','0778421753','Da Silva');
INSERT INTO Livraison(numLiv, typeLiv, tel, nom) VALUES (548632,'chronopost',NULL,NULL);
INSERT INTO Livraison(numLiv, typeLiv, tel, nom) VALUES (548632,'livreur','0369685768','Durant'); */
