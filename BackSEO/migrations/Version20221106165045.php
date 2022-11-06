<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221106165045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerta ADD nombre_tipo_de_amenaza_id INT NOT NULL');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B123FC93340A FOREIGN KEY (nombre_tipo_de_amenaza_id) REFERENCES tipo_de_amenaza (id)');
        $this->addSql('CREATE INDEX IDX_4C3B123FC93340A ON alerta (nombre_tipo_de_amenaza_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B123FC93340A');
        $this->addSql('DROP INDEX IDX_4C3B123FC93340A ON alerta');
        $this->addSql('ALTER TABLE alerta DROP nombre_tipo_de_amenaza_id');
    }
}
