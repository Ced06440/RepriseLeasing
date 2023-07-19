<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230705073836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD dropped_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5673E7AFE FOREIGN KEY (dropped_user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5673E7AFE ON annonce (dropped_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5673E7AFE');
        $this->addSql('DROP INDEX IDX_F65593E5673E7AFE ON annonce');
        $this->addSql('ALTER TABLE annonce DROP dropped_user_id');
    }
}
