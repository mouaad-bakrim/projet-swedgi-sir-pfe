<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230430164601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libellee VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, code_groupe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, user_id INT DEFAULT NULL, societe VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, tel_mobile VARCHAR(255) NOT NULL, tel_bureau VARCHAR(255) NOT NULL, fax VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, site_web VARCHAR(255) NOT NULL, nom_societe VARCHAR(255) NOT NULL, rc VARCHAR(255) NOT NULL, capital VARCHAR(255) NOT NULL, cnss VARCHAR(255) NOT NULL, patente VARCHAR(255) NOT NULL, identicication_fiscale VARCHAR(255) NOT NULL, ice VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, INDEX IDX_C7440455BCF5E72D (categorie_id), INDEX IDX_C7440455A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, tache_type_id INT DEFAULT NULL, tache_id INT DEFAULT NULL, montant VARCHAR(255) NOT NULL, datedebut DATE NOT NULL, INDEX IDX_6034999319EB6921 (client_id), INDEX IDX_60349993F1AB226 (tache_type_id), INDEX IDX_60349993D2235D39 (tache_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE periodicite (id INT AUTO_INCREMENT NOT NULL, tache_type_id INT DEFAULT NULL, tache_id INT DEFAULT NULL, duree VARCHAR(255) DEFAULT NULL, INDEX IDX_D13D99F3F1AB226 (tache_type_id), INDEX IDX_D13D99F3D2235D39 (tache_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tache (id INT AUTO_INCREMENT NOT NULL, periodicite_id INT DEFAULT NULL, designation VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_938720752928752A (periodicite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_6034999319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993F1AB226 FOREIGN KEY (tache_type_id) REFERENCES tache (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993D2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id)');
        $this->addSql('ALTER TABLE periodicite ADD CONSTRAINT FK_D13D99F3F1AB226 FOREIGN KEY (tache_type_id) REFERENCES tache (id)');
        $this->addSql('ALTER TABLE periodicite ADD CONSTRAINT FK_D13D99F3D2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_938720752928752A FOREIGN KEY (periodicite_id) REFERENCES periodicite (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455BCF5E72D');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A76ED395');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_6034999319EB6921');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993F1AB226');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993D2235D39');
        $this->addSql('ALTER TABLE periodicite DROP FOREIGN KEY FK_D13D99F3F1AB226');
        $this->addSql('ALTER TABLE periodicite DROP FOREIGN KEY FK_D13D99F3D2235D39');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_938720752928752A');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE periodicite');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE tache');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
