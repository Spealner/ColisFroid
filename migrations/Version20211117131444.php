<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211117131444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE colis_vehicules');
        $this->addSql('ALTER TABLE colis ADD vehicule_id INT DEFAULT NULL, CHANGE ID id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE colis ADD CONSTRAINT FK_470BDFF94A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('CREATE INDEX IDX_470BDFF94A4A3511 ON colis (vehicule_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE colis_vehicules (colis_id VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, vehicules_id INT NOT NULL, INDEX IDX_CE9C532A4D268D70 (colis_id), INDEX IDX_CE9C532A8D8BD7E2 (vehicules_id), PRIMARY KEY(colis_id, vehicules_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE colis DROP FOREIGN KEY FK_470BDFF94A4A3511');
        $this->addSql('DROP INDEX IDX_470BDFF94A4A3511 ON colis');
        $this->addSql('ALTER TABLE colis DROP vehicule_id, CHANGE id ID INT AUTO_INCREMENT NOT NULL');
    }
}
