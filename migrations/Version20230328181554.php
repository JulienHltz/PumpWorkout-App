<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230328181554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carnet_entrainement (carnet_id INT NOT NULL, entrainement_id INT NOT NULL, INDEX IDX_C621292BFA207516 (carnet_id), INDEX IDX_C621292BA15E8FD (entrainement_id), PRIMARY KEY(carnet_id, entrainement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carnet_entrainement ADD CONSTRAINT FK_C621292BFA207516 FOREIGN KEY (carnet_id) REFERENCES carnet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carnet_entrainement ADD CONSTRAINT FK_C621292BA15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carnet_entrainement DROP FOREIGN KEY FK_C621292BFA207516');
        $this->addSql('ALTER TABLE carnet_entrainement DROP FOREIGN KEY FK_C621292BA15E8FD');
        $this->addSql('DROP TABLE carnet_entrainement');
    }
}
