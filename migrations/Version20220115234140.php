<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220115234140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE decompte DROP FOREIGN KEY FK_9639E1A91586D5F9');
        $this->addSql('ALTER TABLE depouillement DROP FOREIGN KEY FK_932519C21586D5F9');
        $this->addSql('ALTER TABLE service_bureau_vote DROP FOREIGN KEY FK_4EA26AA81586D5F9');
        $this->addSql('ALTER TABLE decompte DROP FOREIGN KEY FK_9639E1A9A708DAFF');
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B63A708DAFF');
        $this->addSql('ALTER TABLE depouillement DROP FOREIGN KEY FK_932519C2A708DAFF');
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B6368D3EA09');
        $this->addSql('ALTER TABLE fos_user DROP FOREIGN KEY FK_957A64797A45358C');
        $this->addSql('ALTER TABLE bureau_vote DROP FOREIGN KEY FK_82384C049358E21D');
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B63924DD2B5');
        $this->addSql('ALTER TABLE lieu_vote DROP FOREIGN KEY FK_D08C20DC924DD2B5');
        $this->addSql('ALTER TABLE localite DROP FOREIGN KEY FK_F5D7E4A9727ACA70');
        $this->addSql('ALTER TABLE localite DROP FOREIGN KEY FK_F5D7E4A979066886');
        $this->addSql('ALTER TABLE fos_user DROP FOREIGN KEY FK_957A6479275ED078');
        $this->addSql('ALTER TABLE membre_service DROP FOREIGN KEY FK_53BA986F16E0884F');
        $this->addSql('ALTER TABLE representant DROP FOREIGN KEY FK_80D5DBC916E0884F');
        $this->addSql('ALTER TABLE election DROP FOREIGN KEY FK_DCA03800EC110D6E');
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C21CE83749C');
        $this->addSql('ALTER TABLE localite DROP FOREIGN KEY FK_F5D7E4A9D9540524');
        $this->addSql('ALTER TABLE membre_liste DROP FOREIGN KEY FK_4AD42575AA023D9F');
        $this->addSql('CREATE TABLE carte (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, etat INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carte3 (id INT AUTO_INCREMENT NOT NULL, liste_id INT DEFAULT NULL, region VARCHAR(255) DEFAULT NULL, departement VARCHAR(255) DEFAULT NULL, arrondissement VARCHAR(255) DEFAULT NULL, commune VARCHAR(255) DEFAULT NULL, implantation VARCHAR(255) DEFAULT NULL, nombre_electeur VARCHAR(255) DEFAULT NULL, nombre_inscrit VARCHAR(255) DEFAULT NULL, nombre_votant VARCHAR(255) DEFAULT NULL, nombre_bulletin_nul VARCHAR(255) DEFAULT NULL, nombre_suffrage_valablement_exprime VARCHAR(255) DEFAULT NULL, nombre_voix_hors_bureau VARCHAR(255) DEFAULT NULL, resultat_departement VARCHAR(255) DEFAULT NULL, resultat_commune_ville VARCHAR(255) DEFAULT NULL, resultat_commune VARCHAR(255) DEFAULT NULL, INDEX IDX_AE64D4C5E85441D8 (liste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carte3 ADD CONSTRAINT FK_AE64D4C5E85441D8 FOREIGN KEY (liste_id) REFERENCES liste (id)');
        $this->addSql('DROP TABLE bureau_vote');
        $this->addSql('DROP TABLE decompte');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE depouillement');
        $this->addSql('DROP TABLE election');
        $this->addSql('DROP TABLE ext_log_entries');
        $this->addSql('DROP TABLE ext_translations');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE lieu_vote');
        $this->addSql('DROP TABLE localite');
        $this->addSql('DROP TABLE membre_liste');
        $this->addSql('DROP TABLE membre_service');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE representant');
        $this->addSql('DROP TABLE scrutin');
        $this->addSql('DROP TABLE service_bureau_vote');
        $this->addSql('DROP TABLE type_election');
        $this->addSql('DROP TABLE type_groupe');
        $this->addSql('DROP TABLE type_localite');
        $this->addSql('DROP TABLE type_membre_liste');
        $this->addSql('DROP TABLE type_membre_service');
        $this->addSql('ALTER TABLE liste ADD suppleants VARCHAR(255) DEFAULT NULL, ADD proportionnel VARCHAR(255) DEFAULT NULL, ADD majoritaire VARCHAR(255) DEFAULT NULL, ADD nombre_votes VARCHAR(255) DEFAULT NULL, CHANGE code titulaires VARCHAR(255) DEFAULT NULL, CHANGE election_id etat INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bureau_vote (id INT AUTO_INCREMENT NOT NULL, lieu_vote_id INT DEFAULT NULL, libelle VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, code VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, inscrit VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, INDEX IDX_82384C049358E21D (lieu_vote_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE decompte (id INT AUTO_INCREMENT NOT NULL, election_id INT DEFAULT NULL, bureau_vote_id INT DEFAULT NULL, hors VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, votant VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, nul VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, exprime VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, etat INT DEFAULT NULL, INDEX IDX_9639E1A91586D5F9 (bureau_vote_id), INDEX IDX_9639E1A9A708DAFF (election_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, election_id INT DEFAULT NULL, localite_id INT DEFAULT NULL, nb_depute VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, fichier VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, User_id INT DEFAULT NULL, etat INT DEFAULT NULL, INDEX IDX_C1765B63924DD2B5 (localite_id), INDEX IDX_C1765B63A708DAFF (election_id), INDEX IDX_C1765B63A76ED395 (User_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE depouillement (id INT AUTO_INCREMENT NOT NULL, election_id INT DEFAULT NULL, liste_id INT DEFAULT NULL, bureau_vote_id INT DEFAULT NULL, valeur VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, etat INT DEFAULT NULL, INDEX IDX_932519C2E85441D8 (liste_id), INDEX IDX_932519C2A708DAFF (election_id), INDEX IDX_932519C21586D5F9 (bureau_vote_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE election (id INT AUTO_INCREMENT NOT NULL, type_election_id INT DEFAULT NULL, libelle VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, code VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, date_premier_tour DATE DEFAULT NULL, date_second_tour DATE DEFAULT NULL, INDEX IDX_DCA03800EC110D6E (type_election_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ext_log_entries (id INT AUTO_INCREMENT NOT NULL, action VARCHAR(8) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, logged_at DATETIME NOT NULL, object_id VARCHAR(64) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, object_class VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, version INT NOT NULL, data LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci` COMMENT \'(DC2Type:array)\', username VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, INDEX log_date_lookup_idx (logged_at), INDEX log_version_lookup_idx (object_id, object_class, version), INDEX log_class_lookup_idx (object_class), INDEX log_user_lookup_idx (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ext_translations (id INT AUTO_INCREMENT NOT NULL, locale VARCHAR(8) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, object_class VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, field VARCHAR(32) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, foreign_key VARCHAR(64) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, content LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, UNIQUE INDEX lookup_unique_idx (locale, object_class, field, foreign_key), INDEX translations_lookup_idx (locale, object_class, foreign_key), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, groupe_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, adresse VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, telephone VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, lieu_naissance VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, date_naissance DATE DEFAULT NULL, zone VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, username VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, username_canonical VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, email_canonical VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci` COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), INDEX IDX_957A64797A45358C (groupe_id), INDEX IDX_957A6479275ED078 (profil_id), UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, type_groupe_id INT DEFAULT NULL, libelle VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, INDEX IDX_4B98C21CE83749C (type_groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lieu_vote (id INT AUTO_INCREMENT NOT NULL, localite_id INT DEFAULT NULL, libelle VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, code VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, nb_bureau_vote VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, INDEX IDX_D08C20DC924DD2B5 (localite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE localite (id INT AUTO_INCREMENT NOT NULL, type_localite_id INT DEFAULT NULL, root_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, libelle VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, numero VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, code VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, lft INT NOT NULL, lvl INT NOT NULL, rgt INT NOT NULL, INDEX IDX_F5D7E4A979066886 (root_id), INDEX IDX_F5D7E4A9D9540524 (type_localite_id), INDEX IDX_F5D7E4A9727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE membre_liste (id INT AUTO_INCREMENT NOT NULL, type_membre_liste_id INT DEFAULT NULL, liste_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, detail VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, INDEX IDX_4AD42575AA023D9F (type_membre_liste_id), INDEX IDX_4AD42575E85441D8 (liste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE membre_service (id INT AUTO_INCREMENT NOT NULL, service_bureau_vote_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, detail VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, INDEX IDX_53BA986F16E0884F (service_bureau_vote_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE representant (id INT AUTO_INCREMENT NOT NULL, service_bureau_vote_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, detail VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, INDEX IDX_80D5DBC916E0884F (service_bureau_vote_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE scrutin (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(7) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, region VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, departement VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, commune VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, lieu VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, bureau INT DEFAULT NULL, nbInscrit INT DEFAULT NULL, nbVotant INT DEFAULT NULL, nbBulletinNul INT DEFAULT NULL, nbValablementExprime INT DEFAULT NULL, nbVoixHorsBureau INT DEFAULT NULL, nbVoixCandidat1 INT DEFAULT NULL, nbVoixCandidat2 INT DEFAULT NULL, nbVoixCandidat3 INT DEFAULT NULL, nbVoixCandidat4 INT DEFAULT NULL, nbVoixCandidat5 INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE service_bureau_vote (id INT AUTO_INCREMENT NOT NULL, bureau_vote_id INT DEFAULT NULL, ouverture DATETIME DEFAULT NULL, fermeture DATETIME DEFAULT NULL, INDEX IDX_4EA26AA81586D5F9 (bureau_vote_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_election (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_groupe (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_localite (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_membre_liste (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_membre_service (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bureau_vote ADD CONSTRAINT FK_82384C049358E21D FOREIGN KEY (lieu_vote_id) REFERENCES lieu_vote (id)');
        $this->addSql('ALTER TABLE decompte ADD CONSTRAINT FK_9639E1A91586D5F9 FOREIGN KEY (bureau_vote_id) REFERENCES bureau_vote (id)');
        $this->addSql('ALTER TABLE decompte ADD CONSTRAINT FK_9639E1A9A708DAFF FOREIGN KEY (election_id) REFERENCES election (id)');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B6368D3EA09 FOREIGN KEY (User_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B63A708DAFF FOREIGN KEY (election_id) REFERENCES election (id)');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B63924DD2B5 FOREIGN KEY (localite_id) REFERENCES localite (id)');
        $this->addSql('ALTER TABLE depouillement ADD CONSTRAINT FK_932519C21586D5F9 FOREIGN KEY (bureau_vote_id) REFERENCES bureau_vote (id)');
        $this->addSql('ALTER TABLE depouillement ADD CONSTRAINT FK_932519C2E85441D8 FOREIGN KEY (liste_id) REFERENCES liste (id)');
        $this->addSql('ALTER TABLE depouillement ADD CONSTRAINT FK_932519C2A708DAFF FOREIGN KEY (election_id) REFERENCES election (id)');
        $this->addSql('ALTER TABLE election ADD CONSTRAINT FK_DCA03800EC110D6E FOREIGN KEY (type_election_id) REFERENCES type_election (id)');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A6479275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A64797A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21CE83749C FOREIGN KEY (type_groupe_id) REFERENCES type_groupe (id)');
        $this->addSql('ALTER TABLE lieu_vote ADD CONSTRAINT FK_D08C20DC924DD2B5 FOREIGN KEY (localite_id) REFERENCES localite (id)');
        $this->addSql('ALTER TABLE localite ADD CONSTRAINT FK_F5D7E4A9727ACA70 FOREIGN KEY (parent_id) REFERENCES localite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE localite ADD CONSTRAINT FK_F5D7E4A9D9540524 FOREIGN KEY (type_localite_id) REFERENCES type_localite (id)');
        $this->addSql('ALTER TABLE localite ADD CONSTRAINT FK_F5D7E4A979066886 FOREIGN KEY (root_id) REFERENCES localite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE membre_liste ADD CONSTRAINT FK_4AD42575AA023D9F FOREIGN KEY (type_membre_liste_id) REFERENCES type_membre_liste (id)');
        $this->addSql('ALTER TABLE membre_liste ADD CONSTRAINT FK_4AD42575E85441D8 FOREIGN KEY (liste_id) REFERENCES liste (id)');
        $this->addSql('ALTER TABLE membre_service ADD CONSTRAINT FK_53BA986F16E0884F FOREIGN KEY (service_bureau_vote_id) REFERENCES service_bureau_vote (id)');
        $this->addSql('ALTER TABLE representant ADD CONSTRAINT FK_80D5DBC916E0884F FOREIGN KEY (service_bureau_vote_id) REFERENCES service_bureau_vote (id)');
        $this->addSql('ALTER TABLE service_bureau_vote ADD CONSTRAINT FK_4EA26AA81586D5F9 FOREIGN KEY (bureau_vote_id) REFERENCES bureau_vote (id)');
        $this->addSql('DROP TABLE carte');
        $this->addSql('DROP TABLE carte3');
        $this->addSql('ALTER TABLE liste ADD code VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, DROP titulaires, DROP suppleants, DROP proportionnel, DROP majoritaire, DROP nombre_votes, CHANGE etat election_id INT DEFAULT NULL');
    }
}
