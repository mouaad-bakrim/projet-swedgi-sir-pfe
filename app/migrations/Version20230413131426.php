<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413131426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, cnss VARCHAR(255) NOT NULL, ir DOUBLE PRECISION NOT NULL, salaire DOUBLE PRECISION NOT NULL, juridique VARCHAR(255) NOT NULL, c_ac VARCHAR(255) NOT NULL, audit VARCHAR(255) NOT NULL, augmentation_capital DOUBLE PRECISION NOT NULL, constitution VARCHAR(255) NOT NULL, transformation_pp VARCHAR(255) NOT NULL, cession_part VARCHAR(255) NOT NULL, livre_cote_paraphe VARCHAR(255) NOT NULL, taxe_professionnelle VARCHAR(255) NOT NULL, tenue_comptabilite VARCHAR(255) NOT NULL, controle VARCHAR(255) NOT NULL, revision VARCHAR(255) NOT NULL, saisie VARCHAR(255) NOT NULL, a_compte_is VARCHAR(255) NOT NULL, bilan VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE tache');
        $this->addSql('ALTER TABLE categorie ADD code_groupe VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client DROP code_groupe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tache (id INT AUTO_INCREMENT NOT NULL, cnss VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ir VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, salaire DOUBLE PRECISION NOT NULL, t_va DOUBLE PRECISION NOT NULL, juridique VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE mission');
        $this->addSql('ALTER TABLE categorie DROP code_groupe');
        $this->addSql('ALTER TABLE client ADD code_groupe VARCHAR(255) NOT NULL');
    }
}
