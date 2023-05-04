<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230504081729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mission');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993F1AB226');
        $this->addSql('DROP INDEX IDX_60349993F1AB226 ON contrat');
        $this->addSql('ALTER TABLE contrat ADD montant VARCHAR(255) NOT NULL, DROP tache_type_id, CHANGE date_debut date_debut DATE NOT NULL');
        $this->addSql('ALTER TABLE periodicite ADD designation VARCHAR(255) NOT NULL, DROP direct, CHANGE duree duree VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tache ADD task_id INT DEFAULT NULL, CHANGE designation designation VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_938720758DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('CREATE INDEX IDX_938720758DB60186 ON tache (task_id)');
        $this->addSql('ALTER TABLE task ADD user_id INT DEFAULT NULL, ADD date_debut DATE NOT NULL, ADD date_fin DATE NOT NULL, ADD status LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_527EDB25A76ED395 ON task (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, cnss VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ir VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, juridique VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, audit VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, constitution VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, transformation_pp VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, controle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, revision VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, saisie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, bilan VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, salares VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tva VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, cac VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, augmentation_de_capital VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, cession_des_parts VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, livres_cotes_paraphes VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, taxes_professionnelles VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tenue_de_comptabilite VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, acompte_is VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, autres VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, designation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE contrat ADD tache_type_id INT DEFAULT NULL, DROP montant, CHANGE date_debut date_debut DATETIME NOT NULL');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993F1AB226 FOREIGN KEY (tache_type_id) REFERENCES tache (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_60349993F1AB226 ON contrat (tache_type_id)');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25A76ED395');
        $this->addSql('DROP INDEX IDX_527EDB25A76ED395 ON task');
        $this->addSql('ALTER TABLE task DROP user_id, DROP date_debut, DROP date_fin, DROP status');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_938720758DB60186');
        $this->addSql('DROP INDEX IDX_938720758DB60186 ON tache');
        $this->addSql('ALTER TABLE tache DROP task_id, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE designation designation VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE periodicite ADD direct TINYINT(1) NOT NULL, DROP designation, CHANGE duree duree DOUBLE PRECISION DEFAULT NULL');
    }
}
