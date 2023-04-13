<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413113924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libellee VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, groupe TINYINT(1) NOT NULL, code_groupe VARCHAR(255) NOT NULL, societe VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, tel_mobile VARCHAR(255) NOT NULL, tel_bureau VARCHAR(255) NOT NULL, fax VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, site_web VARCHAR(255) NOT NULL, nom_societe VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, rc VARCHAR(255) NOT NULL, capital VARCHAR(255) NOT NULL, cnss VARCHAR(255) NOT NULL, patente VARCHAR(255) NOT NULL, identicication_fiscale VARCHAR(255) NOT NULL, ice VARCHAR(255) NOT NULL, INDEX IDX_C7440455BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455BCF5E72D');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
    }
}
