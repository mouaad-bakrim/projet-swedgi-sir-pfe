<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230415120217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libellee VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, code_groupe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, groupe TINYINT(1) NOT NULL, societe VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, tel_mobile VARCHAR(255) NOT NULL, tel_bureau VARCHAR(255) NOT NULL, fax VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, site_web VARCHAR(255) NOT NULL, nom_societe VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, rc VARCHAR(255) NOT NULL, capital VARCHAR(255) NOT NULL, cnss VARCHAR(255) NOT NULL, patente VARCHAR(255) NOT NULL, identicication_fiscale VARCHAR(255) NOT NULL, ice VARCHAR(255) NOT NULL, INDEX IDX_C7440455BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, cnss VARCHAR(255) NOT NULL, ir DOUBLE PRECISION NOT NULL, salaire DOUBLE PRECISION NOT NULL, juridique VARCHAR(255) NOT NULL, c_ac VARCHAR(255) NOT NULL, audit VARCHAR(255) NOT NULL, augmentation_capital DOUBLE PRECISION NOT NULL, constitution VARCHAR(255) NOT NULL, transformation_pp VARCHAR(255) NOT NULL, cession_part VARCHAR(255) NOT NULL, livre_cote_paraphe VARCHAR(255) NOT NULL, taxe_professionnelle VARCHAR(255) NOT NULL, tenue_comptabilite VARCHAR(255) NOT NULL, controle VARCHAR(255) NOT NULL, revision VARCHAR(255) NOT NULL, saisie VARCHAR(255) NOT NULL, a_compte_is VARCHAR(255) NOT NULL, bilan VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455BCF5E72D');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE mission');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
