<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230330162648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_exercice ADD rapport_final_id INT NOT NULL');
        $this->addSql('ALTER TABLE rapport_exercice ADD CONSTRAINT FK_30D827CFC714FBAF FOREIGN KEY (rapport_final_id) REFERENCES rapport_entrainement (id)');
        $this->addSql('CREATE INDEX IDX_30D827CFC714FBAF ON rapport_exercice (rapport_final_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_exercice DROP FOREIGN KEY FK_30D827CFC714FBAF');
        $this->addSql('DROP INDEX IDX_30D827CFC714FBAF ON rapport_exercice');
        $this->addSql('ALTER TABLE rapport_exercice DROP rapport_final_id');
    }
}
