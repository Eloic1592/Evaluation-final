-- Admin
INSERT INTO admin(nom,prenom,email,mdp) VALUES('admin','admin','admin@gmail.com','admin');

-- Employe
INSERT INTO employe(nom,prenom,dtn,adresse,email,mdp) VALUES('emp1','emp1','2002-10-06','LOT VS 102 DR Andranovory','emp1@gmail.com','emp1');

-- Type d'evenement
INSERT INTO type_evenement(type_evenement) VALUES('Fete'),('Spectacle'),('Tournee');

-- Evenement
INSERT INTO evenement(nom,description,date_debut,date_fin,idtype_evenement) values('Fete de l\`independance','Fete de l\`independance de Madagasikara','2023-06-26','2023-06-26',1);


-- Type
Insert into type(type) values('standard'),('premium');

-- Devis
INSERT INTO devis(idevenement,devis,datedebut,datefin) values(1,'devis1','2022-06-21','2022-06-21');
