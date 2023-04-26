<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426104337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, tache_type_id INT DEFAULT NULL, date_debut DATETIME NOT NULL, INDEX IDX_6034999319EB6921 (client_id), INDEX IDX_60349993F1AB226 (tache_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE periodicite (id INT AUTO_INCREMENT NOT NULL, tache_type_id INT DEFAULT NULL, designation VARCHAR(255) NOT NULL, duree DOUBLE PRECISION DEFAULT NULL, direct TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_D13D99F3F1AB226 (tache_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tache_type (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_6034999319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993F1AB226 FOREIGN KEY (tache_type_id) REFERENCES tache_type (id)');
        $this->addSql('ALTER TABLE periodicite ADD CONSTRAINT FK_D13D99F3F1AB226 FOREIGN KEY (tache_type_id) REFERENCES tache_type (id)');
        $this->addSql('ALTER TABLE mission ADD salares VARCHAR(50) NOT NULL, ADD tva VARCHAR(50) NOT NULL, ADD cac VARCHAR(50) NOT NULL, ADD augmentation_de_capital VARCHAR(50) NOT NULL, ADD cession_des_parts VARCHAR(255) NOT NULL, ADD livres_cotes_paraphes VARCHAR(255) NOT NULL, ADD taxes_professionnelles VARCHAR(255) NOT NULL, ADD tenue_de_comptabilite VARCHAR(255) NOT NULL, ADD acompte_is VARCHAR(255) NOT NULL, ADD autres VARCHAR(255) NOT NULL, DROP salaire, DROP c_ac, DROP augmentation_capital, DROP cession_part, DROP livre_cote_paraphe, DROP taxe_professionnelle, DROP tenue_comptabilite, DROP a_compte_is, CHANGE cnss cnss VARCHAR(50) NOT NULL, CHANGE ir ir VARCHAR(255) NOT NULL, CHANGE juridique juridique VARCHAR(50) NOT NULL, CHANGE audit audit VARCHAR(50) NOT NULL, CHANGE constitution constitution VARCHAR(50) NOT NULL, CHANGE transformation_pp transformation_pp VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_6034999319EB6921');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993F1AB226');
        $this->addSql('ALTER TABLE periodicite DROP FOREIGN KEY FK_D13D99F3F1AB226');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE periodicite');
        $this->addSql('DROP TABLE tache_type');
        $this->addSql('DROP TABLE task');
        $this->addSql('ALTER TABLE mission ADD salaire DOUBLE PRECISION NOT NULL, ADD c_ac VARCHAR(255) NOT NULL, ADD augmentation_capital DOUBLE PRECISION NOT NULL, ADD cession_part VARCHAR(255) NOT NULL, ADD livre_cote_paraphe VARCHAR(255) NOT NULL, ADD taxe_professionnelle VARCHAR(255) NOT NULL, ADD tenue_comptabilite VARCHAR(255) NOT NULL, ADD a_compte_is VARCHAR(255) NOT NULL, DROP salares, DROP tva, DROP cac, DROP augmentation_de_capital, DROP cession_des_parts, DROP livres_cotes_paraphes, DROP taxes_professionnelles, DROP tenue_de_comptabilite, DROP acompte_is, DROP autres, CHANGE cnss cnss VARCHAR(255) NOT NULL, CHANGE juridique juridique VARCHAR(255) NOT NULL, CHANGE audit audit VARCHAR(255) NOT NULL, CHANGE constitution constitution VARCHAR(255) NOT NULL, CHANGE transformation_pp transformation_pp VARCHAR(255) NOT NULL, CHANGE ir ir DOUBLE PRECISION NOT NULL');
    }
}
