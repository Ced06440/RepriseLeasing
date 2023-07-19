<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230601100200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, immatriculation VARCHAR(9) NOT NULL, localisation VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, mise_en_service VARCHAR(255) NOT NULL, marque VARCHAR(255) NOT NULL, modele VARCHAR(255) NOT NULL, finition VARCHAR(255) NOT NULL, energie VARCHAR(255) NOT NULL, puissance_fiscal VARCHAR(255) NOT NULL, emission_co2 VARCHAR(255) NOT NULL, boite_de_vitesse VARCHAR(255) NOT NULL, nb_de_portes VARCHAR(255) NOT NULL, nb_de_places VARCHAR(255) NOT NULL, date_dernier_ct VARCHAR(255) NOT NULL, km_parcourus VARCHAR(255) NOT NULL, couleur_ext VARCHAR(255) NOT NULL, couleur_int VARCHAR(255) NOT NULL, equipements VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE modeles');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE modeles (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, modele VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE annonce');
    }
}
