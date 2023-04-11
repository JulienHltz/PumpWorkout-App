<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230330162005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercice ADD rapport_id INT NOT NULL');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74D1DFBCC46 FOREIGN KEY (rapport_id) REFERENCES rapport_exercice (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E418C74D1DFBCC46 ON exercice (rapport_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74D1DFBCC46');
        $this->addSql('DROP INDEX UNIQ_E418C74D1DFBCC46 ON exercice');
        $this->addSql('ALTER TABLE exercice DROP rapport_id');
    }
}
