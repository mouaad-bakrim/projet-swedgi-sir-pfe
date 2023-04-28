<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230428101533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type_tache (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE task');
        $this->addSql('ALTER TABLE periodicite CHANGE duree duree VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tache ADD periodicite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_938720752928752A FOREIGN KEY (periodicite_id) REFERENCES periodicite (id)');
        $this->addSql('CREATE INDEX IDX_938720752928752A ON tache (periodicite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE type_tache');
        $this->addSql('ALTER TABLE periodicite CHANGE duree duree DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_938720752928752A');
        $this->addSql('DROP INDEX IDX_938720752928752A ON tache');
        $this->addSql('ALTER TABLE tache DROP periodicite_id');
    }
}
