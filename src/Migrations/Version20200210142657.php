<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210142657 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE producto (id INT AUTO_INCREMENT NOT NULL, nom_pro VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrato (id INT AUTO_INCREMENT NOT NULL, id_cli_id INT DEFAULT NULL, num_con INT NOT NULL, vig_con DATE NOT NULL, INDEX IDX_666965239A79575D (id_cli_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrato ADD CONSTRAINT FK_666965239A79575D FOREIGN KEY (id_cli_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE pedido CHANGE id_cli_id id_cli_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE direccion CHANGE id_cli_id id_cli_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE producto');
        $this->addSql('DROP TABLE contrato');
        $this->addSql('ALTER TABLE direccion CHANGE id_cli_id id_cli_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pedido CHANGE id_cli_id id_cli_id INT DEFAULT NULL');
    }
}
