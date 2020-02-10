<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210142347 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE direccion ADD id_cli_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE direccion ADD CONSTRAINT FK_F384BE959A79575D FOREIGN KEY (id_cli_id) REFERENCES cliente (id)');
        $this->addSql('CREATE INDEX IDX_F384BE959A79575D ON direccion (id_cli_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE direccion DROP FOREIGN KEY FK_F384BE959A79575D');
        $this->addSql('DROP INDEX IDX_F384BE959A79575D ON direccion');
        $this->addSql('ALTER TABLE direccion DROP id_cli_id');
    }
}
