<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427115433 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993F1AB226');
        $this->addSql('ALTER TABLE periodicite DROP FOREIGN KEY FK_D13D99F3F1AB226');
        $this->addSql('CREATE TABLE tache (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE tache_type');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993F1AB226');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993F1AB226 FOREIGN KEY (tache_type_id) REFERENCES tache (id)');
        $this->addSql('ALTER TABLE mission ADD designation VARCHAR(255) DEFAULT NULL, ADD description LONGTEXT DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_D13D99F3F1AB226 ON periodicite');
        $this->addSql('ALTER TABLE periodicite DROP tache_type_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993F1AB226');
        $this->addSql('CREATE TABLE tache_type (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE tache');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993F1AB226');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993F1AB226 FOREIGN KEY (tache_type_id) REFERENCES tache_type (id)');
        $this->addSql('ALTER TABLE mission DROP designation, DROP description');
        $this->addSql('ALTER TABLE periodicite ADD tache_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE periodicite ADD CONSTRAINT FK_D13D99F3F1AB226 FOREIGN KEY (tache_type_id) REFERENCES tache_type (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D13D99F3F1AB226 ON periodicite (tache_type_id)');
    }
}
