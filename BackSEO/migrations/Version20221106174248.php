<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221106174248 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B12380E343D5');
        $this->addSql('DROP INDEX IDX_4C3B12380E343D5 ON alerta');
        $this->addSql('ALTER TABLE alerta CHANGE nivel_gravedad_id nivelgravedad_id INT NOT NULL');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B123849405A9 FOREIGN KEY (nivelgravedad_id) REFERENCES gravedad_amenaza (id)');
        $this->addSql('CREATE INDEX IDX_4C3B123849405A9 ON alerta (nivelgravedad_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B123849405A9');
        $this->addSql('DROP INDEX IDX_4C3B123849405A9 ON alerta');
        $this->addSql('ALTER TABLE alerta CHANGE nivelgravedad_id nivel_gravedad_id INT NOT NULL');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B12380E343D5 FOREIGN KEY (nivel_gravedad_id) REFERENCES gravedad_amenaza (id)');
        $this->addSql('CREATE INDEX IDX_4C3B12380E343D5 ON alerta (nivel_gravedad_id)');
    }
}
