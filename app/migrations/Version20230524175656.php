<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524175656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993D2235D39');
        $this->addSql('DROP INDEX IDX_60349993D2235D39 ON contrat');
        $this->addSql('ALTER TABLE contrat DROP tache_id');
        $this->addSql('ALTER TABLE service ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD2A76ED395 ON service (user_id)');
        $this->addSql('ALTER TABLE task ADD contrat_id INT NOT NULL, ADD service_id INT NOT NULL');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB251823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_527EDB251823061F ON task (contrat_id)');
        $this->addSql('CREATE INDEX IDX_527EDB25ED5CA9E6 ON task (service_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat ADD tache_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993D2235D39 FOREIGN KEY (tache_id) REFERENCES task (id)');
        $this->addSql('CREATE INDEX IDX_60349993D2235D39 ON contrat (tache_id)');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2A76ED395');
        $this->addSql('DROP INDEX IDX_E19D9AD2A76ED395 ON service');
        $this->addSql('ALTER TABLE service DROP user_id');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB251823061F');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25ED5CA9E6');
        $this->addSql('DROP INDEX IDX_527EDB251823061F ON task');
        $this->addSql('DROP INDEX IDX_527EDB25ED5CA9E6 ON task');
        $this->addSql('ALTER TABLE task DROP contrat_id, DROP service_id');
    }
}
