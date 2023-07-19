<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230615073905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD societe_financement VARCHAR(255) NOT NULL, ADD contrat_option VARCHAR(255) NOT NULL, ADD duree_contrat VARCHAR(255) NOT NULL, ADD date_fin_contrat VARCHAR(255) NOT NULL, ADD max_km_contrat VARCHAR(255) NOT NULL, ADD prix_kms_supp VARCHAR(255) NOT NULL, ADD apport VARCHAR(255) NOT NULL, ADD recup_apport VARCHAR(255) NOT NULL, ADD loyer_mensuelle VARCHAR(255) NOT NULL, ADD nb_mois_offert VARCHAR(255) NOT NULL, ADD type_contrat VARCHAR(255) NOT NULL, ADD type_cession VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP societe_financement, DROP contrat_option, DROP duree_contrat, DROP date_fin_contrat, DROP max_km_contrat, DROP prix_kms_supp, DROP apport, DROP recup_apport, DROP loyer_mensuelle, DROP nb_mois_offert, DROP type_contrat, DROP type_cession');
    }
}
