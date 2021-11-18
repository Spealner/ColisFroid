<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211112152402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE colis_vehicules (colis_id VARCHAR(255) NOT NULL, vehicules_id INT NOT NULL, INDEX IDX_CE9C532A4D268D70 (colis_id), INDEX IDX_CE9C532A8D8BD7E2 (vehicules_id), PRIMARY KEY(colis_id, vehicules_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE colis_vehicules ADD CONSTRAINT FK_CE9C532A4D268D70 FOREIGN KEY (colis_id) REFERENCES colis (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE colis_vehicules ADD CONSTRAINT FK_CE9C532A8D8BD7E2 FOREIGN KEY (vehicules_id) REFERENCES vehicules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE colis CHANGE ID id VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE colis_vehicules');
        $this->addSql('ALTER TABLE colis CHANGE id ID INT AUTO_INCREMENT NOT NULL');
    }
}
