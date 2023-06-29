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
DROP TABLE IF EXISTS devisdepenses;
DROP TABLE IF EXISTS devisartistes;
DROP TABLE IF EXISTS detail_devis;
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

-- Table nombre: 14

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


Create table lieu(
    id serial not null primary key,
    lieu varchar(100) not null,
    capacite int not null default 0,
    prixbase double precision default 0,
    etat int not null default 0
);

-- A inserer


Create table autredepense(
    id serial primary key,
    nom text,
    prixbase float,
    etat int not null default 0
);

-- Create table devis(
--     id serial not null primary key,
--     idevenement varchar(100) not null,
--     date_devis timestamp,
--     etat int not null default 0
-- );


Create table devis(
    id serial not null primary key,
    idsonorisation int references sonorisation(id),
    heureSonorisation int,
    idlogistique int references logistique(id),
    heureLogistique int,
    idlieu int references lieu(id),
    prixlieu float,
    datedebut date default current_date,
    datefin date default current_date,
    etat int not null default 0
);

Create table devisartistes(
    id serial primary key,
    iddevis int references devis(id),
    idartiste int references artiste(id),
    heureArtiste int
);

create table devisdepenses(
    id serial primary key,
    iddevis int references devis(id),
    idautredepense int references autredepense(id),
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


