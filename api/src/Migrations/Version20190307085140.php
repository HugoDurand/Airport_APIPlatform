<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190307085140 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE vols_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE avions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE bagages_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE compagnies_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE employes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE aeroports_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reservations_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pistes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE clients_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE vols (id INT NOT NULL, avion_id INT NOT NULL, aeroport_depart_id INT NOT NULL, aeroport_arrivee_id INT NOT NULL, piste_id INT NOT NULL, numero VARCHAR(255) NOT NULL, heure_depart TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, heure_arrivee TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, prix INT NOT NULL, escales BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2CDFA86C80BBB841 ON vols (avion_id)');
        $this->addSql('CREATE INDEX IDX_2CDFA86CE3CBAF6E ON vols (aeroport_depart_id)');
        $this->addSql('CREATE INDEX IDX_2CDFA86CA1B96354 ON vols (aeroport_arrivee_id)');
        $this->addSql('CREATE INDEX IDX_2CDFA86CC34065BC ON vols (piste_id)');
        $this->addSql('CREATE TABLE vols_employes (vols_id INT NOT NULL, employes_id INT NOT NULL, PRIMARY KEY(vols_id, employes_id))');
        $this->addSql('CREATE INDEX IDX_6991BDF8573E0EFC ON vols_employes (vols_id)');
        $this->addSql('CREATE INDEX IDX_6991BDF8F971F91F ON vols_employes (employes_id)');
        $this->addSql('CREATE TABLE avions (id INT NOT NULL, compagnie_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, nombre_places INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_332F3A0852FBE437 ON avions (compagnie_id)');
        $this->addSql('CREATE TABLE bagages (id INT NOT NULL, client_id INT NOT NULL, poid INT DEFAULT NULL, soute BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_767B07B719EB6921 ON bagages (client_id)');
        $this->addSql('CREATE TABLE compagnies (id INT NOT NULL, nom VARCHAR(255) NOT NULL, origine VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
        $this->addSql('CREATE TABLE employes (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, job VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE aeroports (id INT NOT NULL, nom VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE reservations (id INT NOT NULL, vol_id INT NOT NULL, numero VARCHAR(255) NOT NULL, classe VARCHAR(255) NOT NULL, check_in BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4DA2399F2BFB7A ON reservations (vol_id)');
        $this->addSql('CREATE TABLE reservations_clients (reservations_id INT NOT NULL, clients_id INT NOT NULL, PRIMARY KEY(reservations_id, clients_id))');
        $this->addSql('CREATE INDEX IDX_8DF05CAAD9A7F869 ON reservations_clients (reservations_id)');
        $this->addSql('CREATE INDEX IDX_8DF05CAAAB014612 ON reservations_clients (clients_id)');
        $this->addSql('CREATE TABLE pistes (id INT NOT NULL, numero VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE pistes_employes (pistes_id INT NOT NULL, employes_id INT NOT NULL, PRIMARY KEY(pistes_id, employes_id))');
        $this->addSql('CREATE INDEX IDX_8E09963C256502E7 ON pistes_employes (pistes_id)');
        $this->addSql('CREATE INDEX IDX_8E09963CF971F91F ON pistes_employes (employes_id)');
        $this->addSql('CREATE TABLE clients (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, numero_titre_identite VARCHAR(255) NOT NULL, age INT NOT NULL, sexe VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel INT NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE vols ADD CONSTRAINT FK_2CDFA86C80BBB841 FOREIGN KEY (avion_id) REFERENCES avions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vols ADD CONSTRAINT FK_2CDFA86CE3CBAF6E FOREIGN KEY (aeroport_depart_id) REFERENCES aeroports (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vols ADD CONSTRAINT FK_2CDFA86CA1B96354 FOREIGN KEY (aeroport_arrivee_id) REFERENCES aeroports (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vols ADD CONSTRAINT FK_2CDFA86CC34065BC FOREIGN KEY (piste_id) REFERENCES pistes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vols_employes ADD CONSTRAINT FK_6991BDF8573E0EFC FOREIGN KEY (vols_id) REFERENCES vols (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vols_employes ADD CONSTRAINT FK_6991BDF8F971F91F FOREIGN KEY (employes_id) REFERENCES employes (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE avions ADD CONSTRAINT FK_332F3A0852FBE437 FOREIGN KEY (compagnie_id) REFERENCES compagnies (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bagages ADD CONSTRAINT FK_767B07B719EB6921 FOREIGN KEY (client_id) REFERENCES clients (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA2399F2BFB7A FOREIGN KEY (vol_id) REFERENCES vols (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservations_clients ADD CONSTRAINT FK_8DF05CAAD9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservations (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservations_clients ADD CONSTRAINT FK_8DF05CAAAB014612 FOREIGN KEY (clients_id) REFERENCES clients (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pistes_employes ADD CONSTRAINT FK_8E09963C256502E7 FOREIGN KEY (pistes_id) REFERENCES pistes (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pistes_employes ADD CONSTRAINT FK_8E09963CF971F91F FOREIGN KEY (employes_id) REFERENCES employes (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE greeting');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE vols_employes DROP CONSTRAINT FK_6991BDF8573E0EFC');
        $this->addSql('ALTER TABLE reservations DROP CONSTRAINT FK_4DA2399F2BFB7A');
        $this->addSql('ALTER TABLE vols DROP CONSTRAINT FK_2CDFA86C80BBB841');
        $this->addSql('ALTER TABLE avions DROP CONSTRAINT FK_332F3A0852FBE437');
        $this->addSql('ALTER TABLE vols_employes DROP CONSTRAINT FK_6991BDF8F971F91F');
        $this->addSql('ALTER TABLE pistes_employes DROP CONSTRAINT FK_8E09963CF971F91F');
        $this->addSql('ALTER TABLE vols DROP CONSTRAINT FK_2CDFA86CE3CBAF6E');
        $this->addSql('ALTER TABLE vols DROP CONSTRAINT FK_2CDFA86CA1B96354');
        $this->addSql('ALTER TABLE reservations_clients DROP CONSTRAINT FK_8DF05CAAD9A7F869');
        $this->addSql('ALTER TABLE vols DROP CONSTRAINT FK_2CDFA86CC34065BC');
        $this->addSql('ALTER TABLE pistes_employes DROP CONSTRAINT FK_8E09963C256502E7');
        $this->addSql('ALTER TABLE bagages DROP CONSTRAINT FK_767B07B719EB6921');
        $this->addSql('ALTER TABLE reservations_clients DROP CONSTRAINT FK_8DF05CAAAB014612');
        $this->addSql('DROP SEQUENCE vols_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE avions_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE bagages_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE compagnies_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE employes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE aeroports_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reservations_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pistes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE clients_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE vols');
        $this->addSql('DROP TABLE vols_employes');
        $this->addSql('DROP TABLE avions');
        $this->addSql('DROP TABLE bagages');
        $this->addSql('DROP TABLE compagnies');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE employes');
        $this->addSql('DROP TABLE aeroports');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('DROP TABLE reservations_clients');
        $this->addSql('DROP TABLE pistes');
        $this->addSql('DROP TABLE pistes_employes');
        $this->addSql('DROP TABLE clients');
    }
}
