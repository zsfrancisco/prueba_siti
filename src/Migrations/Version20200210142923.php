<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210142923 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contrato_producto (id INT AUTO_INCREMENT NOT NULL, id_con_id INT DEFAULT NULL, id_pro_id INT DEFAULT NULL, INDEX IDX_6A8FB6BD400E1534 (id_con_id), INDEX IDX_6A8FB6BDE5805157 (id_pro_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedido_producto (id INT AUTO_INCREMENT NOT NULL, id_ped_id INT DEFAULT NULL, id_pro_id INT DEFAULT NULL, cantidad INT NOT NULL, INDEX IDX_DD333C2E0419DC4 (id_ped_id), INDEX IDX_DD333C2E5805157 (id_pro_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrato_producto ADD CONSTRAINT FK_6A8FB6BD400E1534 FOREIGN KEY (id_con_id) REFERENCES contrato (id)');
        $this->addSql('ALTER TABLE contrato_producto ADD CONSTRAINT FK_6A8FB6BDE5805157 FOREIGN KEY (id_pro_id) REFERENCES producto (id)');
        $this->addSql('ALTER TABLE pedido_producto ADD CONSTRAINT FK_DD333C2E0419DC4 FOREIGN KEY (id_ped_id) REFERENCES pedido (id)');
        $this->addSql('ALTER TABLE pedido_producto ADD CONSTRAINT FK_DD333C2E5805157 FOREIGN KEY (id_pro_id) REFERENCES producto (id)');
        $this->addSql('ALTER TABLE pedido CHANGE id_cli_id id_cli_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE direccion CHANGE id_cli_id id_cli_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contrato CHANGE id_cli_id id_cli_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE contrato_producto');
        $this->addSql('DROP TABLE pedido_producto');
        $this->addSql('ALTER TABLE contrato CHANGE id_cli_id id_cli_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE direccion CHANGE id_cli_id id_cli_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pedido CHANGE id_cli_id id_cli_id INT DEFAULT NULL');
    }
}
