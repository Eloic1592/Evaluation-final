Create database gestion_evenement;
Create role gestion_evenement login password 'gestion_evenement';
Alter database gestion_evenement owner to gestion_evenement;
\c gestion_evenement gestion_evenement
gestion_evenement

DO $$ DECLARE
    r RECORD;
BEGIN
    FOR r IN (SELECT tablename FROM pg_tables WHERE schemaname = current_schema()) LOOP
        EXECUTE 'DROP TABLE IF EXISTS ' || quote_ident(r.tablename) || ' CASCADE';
    END LOOP;
END $$;


-- DROP tables
DROP TABLE IF EXISTS place_lieu;
DROP TABLE IF EXISTS categorie_place;
DROP TABLE IF EXISTS devisdepenses;
DROP TABLE IF EXISTS devislieu;
DROP TABLE IF EXISTS devislogistique;
DROP TABLE IF EXISTS devissonorisation;
DROP TABLE IF EXISTS devisartistes;
DROP TABLE IF EXISTS devis;
DROP TABLE IF EXISTS autredepense;
DROP TABLE IF EXISTS lieu;
DROP TABLE IF EXISTS logistique;
DROP TABLE IF EXISTS sonorisation;
DROP TABLE IF EXISTS artiste;
DROP TABLE IF EXISTS type;
DROP TABLE IF EXISTS ticketing;
DROP TABLE IF EXISTS evenement;
DROP TABLE IF EXISTS type_evenement;
DROP TABLE IF EXISTS employe;
DROP TABLE IF EXISTS admin;

-- Table nombre: 21 tables au total

Create Table admin(
    id serial not null primary key,
    nom varchar(100) not null,
    prenom varchar(100) not null,
    email varchar(100) not null,
    mdp varchar(100) not null
);


Create table employe(
    id serial not null primary key,
    nom varchar(100) not null,
    prenom varchar(100) not null,
    dtn date not null,
    adresse varchar(100) not null,
    email varchar(100) not null,
    mdp varchar(100) not null
);

Create table type_evenement(
    id serial not null primary key,
    type_evenement varchar(100) not null,
    etat int not null default 0
);

Create table evenement(
    id serial not null primary key,
    nom   varchar(170) not null,
    description text default null,
    date_debut timestamp,
    date_fin timestamp,
    idtype_evenement int not null references type_evenement(id),
    etat int not null default 0
);

Create table ticketing(
    id serial not null primary key,
    idevenement int not null references evenement(id),
    date_debut timestamp,
    date_fin timestamp,
    prixunitaire double precision  default 0,
    etat int not null default 0,
    quantite double precision default 0
);



-- Type:standard na premium
Create table type(
    id serial not null primary key,
    type varchar(120) not null,
    etat int not null default 0
);


Create table artiste(
    id serial not null primary key,
    artiste varchar(120) not null,
    tarif_heure double precision default 0,
    prixbase double precision default 0,
    photo TEXT,
    etat int not null default 0
);

Create table sonorisation(
    id serial not null primary key,
    sonorisation varchar(120) not null,
    tarif_heure double precision default 0,
    idtype int not null references Type(id),
    prixbase double precision default 0,
    etat int not null default 0
);

Create table logistique(
    id serial not null primary key,
    logistique varchar(120) not null,
    tarif_jour double precision default 0,
    idtype int not null references Type(id),
    prixbase double precision default 0,
    etat int not null default 0
);

Create table type_lieu(
    id serial not null primary key,
    type_lieu varchar(70) not null,
    etat int not null default 0
);

Create table lieu(
    id serial not null primary key,
    lieu varchar(100) not null,
    capacite int not null default 0,
    prixbase double precision default 0,
    idtype_lieu  int not null references type_lieu(id),
    photo text,
    etat int not null default 0
);


Create table categorie_place(
    id serial not null primary key,
    categorie_place varchar(100) not null,
    etat int not null default 0
);

Create table place_lieu(
    id serial not null primary key,
    idlieu int not null references lieu(id),
    idcategorie_place int not null references categorie_place(id),
    nombreplace double precision default 0,
    prixbase double precision default 0,
    etat int not null default 0
);


Create table autredepense(
    id serial primary key,
    nom text,
    prixbase float,
    etat int not null default 0
);

-- A inserer

-- 12
Create table devis(
    id serial not null primary key,
    idevenement int not null references evenement(id),
    devis text,
    datedebut date default current_date,
    datefin date default current_date,
    etat int not null default 0
);

-- Artiste maromaro
Create table devisartistes(
    id serial primary key,
    iddevis int references devis(id),
    idartiste int references artiste(id),
    heureArtiste int
);

-- sonorisation maromaro
Create table devissonorisation(
    id serial primary key,
    iddevis int references devis(id),
    idsonorisation int references sonorisation(id),
    quantite double precision default 0,
    heureSonorisation int
);

-- logistique maromaro

Create table devislogistique(
    id serial primary key,
    iddevis int references devis(id),
    idlogistique int references logistique(id),
    quantite double precision default 0,
    jour int
);

-- Lieu 1
Create table devislieu(
    id serial primary key,
    iddevis int references devis(id),
    idlieu int references lieu(id),
    prix double precision default 0.0
);

-- depenses maromaro
create table devisdepenses(
    id serial primary key,
    iddevis int references devis(id),
    idautredepense int references autredepense(id),
    prix float
);

-- Type place maromaro ao anaty toerana iray
Create table devisplace(
    id serial primary key,
    iddevis int references devis(id),
    idplace int references place_lieu(id),
    prix float
);




-- View:2
-- Evenement
drop view v_liste_evenement;
Create or replace  view v_liste_evenement as
select e.*,te.type_evenement from evenement e join type_evenement te on e.idtype_evenement=te.id;

-- Ticketing
drop view v_liste_ticketing;
Create or replace  view v_liste_ticketing as
select t.*,e.nom from ticketing t join evenement e on t.idevenement=e.id;

-- devis
drop view v_liste_devis;
Create or replace  view v_liste_devis as
select d.id,d.idevenement,d.devis,e.nom,e.description,e.date_debut,e.date_fin from devis d join evenement e on d.idevenement=e.id;

-- place
drop view v_liste_place;
Create or replace  view v_liste_place as
select t.*,l.lieu,cp.categorie_place from place_lieu t join lieu l on t.idlieu=l.id join categorie_place cp on t.idcategorie_place=cp.id;

-- Details devis des evenements

-- Devis artiste
drop view v_liste_devisartiste;
Create or replace  view v_liste_devisartiste as
select d.*,a.artiste,a.tarif_heure,a.photo from devisartistes d join artiste a on d.idartiste=a.id;

-- Devis sono
drop view v_liste_devissono;
Create or replace  view v_liste_devissono as
select d.*,s.sonorisation,s.tarif_heure from devissonorisation d join sonorisation s on d.idsonorisation=s.id;

-- Devis logistique
drop view v_liste_devislogistics;
Create or replace  view v_liste_devislogistics as
select d.*,l.logistique,l.tarif_jour from devislogistique d join logistique l on d.idlogistique=l.id;

-- Devis autre depense
drop view v_liste_devisdepense;
Create or replace  view v_liste_devisdepense as
select d.*,a.nom,a.prixbase from devisdepenses d join autredepense a on d.idautredepense=a.id;

-- Devis lieu
drop view v_liste_devislieu;
Create or replace  view v_liste_devislieu as
select d.*,l.lieu,l.photo from devislieu d join lieu l on d.idlieu=l.id;

-- Devis place;
drop view v_liste_devisplace;
Create or replace  view v_liste_devisplace as
select d.*,pl.idlieu,l.lieu,cp.categorie_place,pl.nombreplace from devisplace d join place_lieu pl on d.idplace=pl.id join lieu l on pl.idlieu=l.id join categorie_place cp on pl.idcategorie_place=cp.id;


--recette
select coalesce(sum(prix*nombreplace),0) FROM V_LISTE_devisPLACE where iddevis=1 and idlieu=1;
