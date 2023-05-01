<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230501160148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, tache_type_id INT DEFAULT NULL, tache_id INT DEFAULT NULL, montant VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, INDEX IDX_6034999319EB6921 (client_id), INDEX IDX_60349993F1AB226 (tache_type_id), INDEX IDX_60349993D2235D39 (tache_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_6034999319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993F1AB226 FOREIGN KEY (tache_type_id) REFERENCES tache (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993D2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_6034999319EB6921');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993F1AB226');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993D2235D39');
        $this->addSql('DROP TABLE contrat');
    }
}
