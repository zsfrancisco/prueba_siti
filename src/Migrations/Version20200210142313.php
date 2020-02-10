<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210142313 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cliente DROP FOREIGN KEY FK_F41C9B25D0A7BD7');
        $this->addSql('DROP INDEX IDX_F41C9B25D0A7BD7 ON cliente');
        $this->addSql('ALTER TABLE cliente DROP direccion_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cliente ADD direccion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cliente ADD CONSTRAINT FK_F41C9B25D0A7BD7 FOREIGN KEY (direccion_id) REFERENCES direccion (id)');
        $this->addSql('CREATE INDEX IDX_F41C9B25D0A7BD7 ON cliente (direccion_id)');
    }
}
