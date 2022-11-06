<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221106164247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerta ADD nivel_gravedad_id INT NOT NULL, ADD superficie_afectada_id INT NOT NULL, ADD tiempo_desarrollo_id INT NOT NULL');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B12380E343D5 FOREIGN KEY (nivel_gravedad_id) REFERENCES gravedad_amenaza (id)');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B1233D65129E FOREIGN KEY (superficie_afectada_id) REFERENCES superficie_amenaza (id)');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B1235221246E FOREIGN KEY (tiempo_desarrollo_id) REFERENCES tiempo_amenaza (id)');
        $this->addSql('CREATE INDEX IDX_4C3B12380E343D5 ON alerta (nivel_gravedad_id)');
        $this->addSql('CREATE INDEX IDX_4C3B1233D65129E ON alerta (superficie_afectada_id)');
        $this->addSql('CREATE INDEX IDX_4C3B1235221246E ON alerta (tiempo_desarrollo_id)');
        $this->addSql('ALTER TABLE tiempo_amenaza CHANGE tiempo_desarollo tiempo_desarrollo INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B12380E343D5');
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B1233D65129E');
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B1235221246E');
        $this->addSql('DROP INDEX IDX_4C3B12380E343D5 ON alerta');
        $this->addSql('DROP INDEX IDX_4C3B1233D65129E ON alerta');
        $this->addSql('DROP INDEX IDX_4C3B1235221246E ON alerta');
        $this->addSql('ALTER TABLE alerta DROP nivel_gravedad_id, DROP superficie_afectada_id, DROP tiempo_desarrollo_id');
        $this->addSql('ALTER TABLE tiempo_amenaza CHANGE tiempo_desarrollo tiempo_desarollo INT NOT NULL');
    }
}
