<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230504101100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat ADD type_tache_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_603499931FDC7AC5 FOREIGN KEY (type_tache_id) REFERENCES type_tache (id)');
        $this->addSql('CREATE INDEX IDX_603499931FDC7AC5 ON contrat (type_tache_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_603499931FDC7AC5');
        $this->addSql('DROP INDEX IDX_603499931FDC7AC5 ON contrat');
        $this->addSql('ALTER TABLE contrat DROP type_tache_id');
    }
}
