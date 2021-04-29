<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210428091449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arbitre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, prenom VARCHAR(45) NOT NULL, nationnalite VARCHAR(50) NOT NULL, role VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, date_creation DATE NOT NULL, date_debut_saison DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, id_club_id INT NOT NULL, id_entraineur_id INT NOT NULL, nom VARCHAR(45) NOT NULL, ville VARCHAR(45) NOT NULL, INDEX IDX_2449BA15BF84A342 (id_club_id), INDEX IDX_2449BA15B1ACA9C4 (id_entraineur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_match (id INT AUTO_INCREMENT NOT NULL, arbitre_principal_id INT NOT NULL, arbitre_assistant1_id INT NOT NULL, arbitre_assistant2_id INT NOT NULL, equipe_domicile_id INT NOT NULL, equipe_exterieure_id INT NOT NULL, status_id INT NOT NULL, date_debut DATETIME NOT NULL, nom VARCHAR(45) NOT NULL, stade VARCHAR(45) NOT NULL, INDEX IDX_DB2F3A614A633 (arbitre_principal_id), INDEX IDX_DB2F3A1E1A7342 (arbitre_assistant1_id), INDEX IDX_DB2F3ACAFDCAC (arbitre_assistant2_id), INDEX IDX_DB2F3A5FE1AEAD (equipe_domicile_id), INDEX IDX_DB2F3A8923FCCA (equipe_exterieure_id), INDEX IDX_DB2F3A6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jouer (id INT AUTO_INCREMENT NOT NULL, id_fiche_match_id INT NOT NULL, id_joueur_id INT NOT NULL, id_placement_id INT NOT NULL, id_poste_id INT NOT NULL, id_role_id INT NOT NULL, INDEX IDX_825E5AED71C62B41 (id_fiche_match_id), INDEX IDX_825E5AED29D76B4B (id_joueur_id), INDEX IDX_825E5AEDC571BEF (id_placement_id), INDEX IDX_825E5AEDF04BBC13 (id_poste_id), INDEX IDX_825E5AED89E8BDC (id_role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, equipe_id INT NOT NULL, role_id INT NOT NULL, nom VARCHAR(45) NOT NULL, prenom VARCHAR(45) NOT NULL, date_naissance DATE NOT NULL, numero INT NOT NULL, INDEX IDX_FD71A9C56D861B89 (equipe_id), INDEX IDX_FD71A9C5D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marquer_but (id INT AUTO_INCREMENT NOT NULL, id_fiche_match_id INT NOT NULL, id_joueur_id INT NOT NULL, contre_son_camp TINYINT(1) NOT NULL, min_but INT NOT NULL, INDEX IDX_C82B952671C62B41 (id_fiche_match_id), INDEX IDX_C82B952629D76B4B (id_joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE placement (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recevoir_carton (fiche_match_id INT NOT NULL, joueur_id INT NOT NULL, couleur VARCHAR(5) NOT NULL, INDEX IDX_7F7F6BB24CA09647 (fiche_match_id), INDEX IDX_7F7F6BB2A9E2D76C (joueur_id), PRIMARY KEY(fiche_match_id, joueur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_joueur (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status_fiche (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA15BF84A342 FOREIGN KEY (id_club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA15B1ACA9C4 FOREIGN KEY (id_entraineur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fiche_match ADD CONSTRAINT FK_DB2F3A614A633 FOREIGN KEY (arbitre_principal_id) REFERENCES arbitre (id)');
        $this->addSql('ALTER TABLE fiche_match ADD CONSTRAINT FK_DB2F3A1E1A7342 FOREIGN KEY (arbitre_assistant1_id) REFERENCES arbitre (id)');
        $this->addSql('ALTER TABLE fiche_match ADD CONSTRAINT FK_DB2F3ACAFDCAC FOREIGN KEY (arbitre_assistant2_id) REFERENCES arbitre (id)');
        $this->addSql('ALTER TABLE fiche_match ADD CONSTRAINT FK_DB2F3A5FE1AEAD FOREIGN KEY (equipe_domicile_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE fiche_match ADD CONSTRAINT FK_DB2F3A8923FCCA FOREIGN KEY (equipe_exterieure_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE fiche_match ADD CONSTRAINT FK_DB2F3A6BF700BD FOREIGN KEY (status_id) REFERENCES status_fiche (id)');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AED71C62B41 FOREIGN KEY (id_fiche_match_id) REFERENCES fiche_match (id)');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AED29D76B4B FOREIGN KEY (id_joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AEDC571BEF FOREIGN KEY (id_placement_id) REFERENCES placement (id)');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AEDF04BBC13 FOREIGN KEY (id_poste_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AED89E8BDC FOREIGN KEY (id_role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C56D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C5D60322AC FOREIGN KEY (role_id) REFERENCES role_joueur (id)');
        $this->addSql('ALTER TABLE marquer_but ADD CONSTRAINT FK_C82B952671C62B41 FOREIGN KEY (id_fiche_match_id) REFERENCES fiche_match (id)');
        $this->addSql('ALTER TABLE marquer_but ADD CONSTRAINT FK_C82B952629D76B4B FOREIGN KEY (id_joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE recevoir_carton ADD CONSTRAINT FK_7F7F6BB24CA09647 FOREIGN KEY (fiche_match_id) REFERENCES fiche_match (id)');
        $this->addSql('ALTER TABLE recevoir_carton ADD CONSTRAINT FK_7F7F6BB2A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche_match DROP FOREIGN KEY FK_DB2F3A614A633');
        $this->addSql('ALTER TABLE fiche_match DROP FOREIGN KEY FK_DB2F3A1E1A7342');
        $this->addSql('ALTER TABLE fiche_match DROP FOREIGN KEY FK_DB2F3ACAFDCAC');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA15BF84A342');
        $this->addSql('ALTER TABLE fiche_match DROP FOREIGN KEY FK_DB2F3A5FE1AEAD');
        $this->addSql('ALTER TABLE fiche_match DROP FOREIGN KEY FK_DB2F3A8923FCCA');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C56D861B89');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AED71C62B41');
        $this->addSql('ALTER TABLE marquer_but DROP FOREIGN KEY FK_C82B952671C62B41');
        $this->addSql('ALTER TABLE recevoir_carton DROP FOREIGN KEY FK_7F7F6BB24CA09647');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AED29D76B4B');
        $this->addSql('ALTER TABLE marquer_but DROP FOREIGN KEY FK_C82B952629D76B4B');
        $this->addSql('ALTER TABLE recevoir_carton DROP FOREIGN KEY FK_7F7F6BB2A9E2D76C');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AEDC571BEF');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AEDF04BBC13');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AED89E8BDC');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C5D60322AC');
        $this->addSql('ALTER TABLE fiche_match DROP FOREIGN KEY FK_DB2F3A6BF700BD');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA15B1ACA9C4');
        $this->addSql('DROP TABLE arbitre');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE fiche_match');
        $this->addSql('DROP TABLE jouer');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE marquer_but');
        $this->addSql('DROP TABLE placement');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE recevoir_carton');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_joueur');
        $this->addSql('DROP TABLE status_fiche');
        $this->addSql('DROP TABLE user');
    }
}
