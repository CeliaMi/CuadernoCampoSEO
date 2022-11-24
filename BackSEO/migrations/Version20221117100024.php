<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221117100024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B123849405A9');
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B1233D65129E');
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B1235221246E');
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B123FC93340A');
        $this->addSql('DROP TABLE gravedad_amenaza');
        $this->addSql('DROP TABLE superficie_amenaza');
        $this->addSql('DROP TABLE tiempo_amenaza');
        $this->addSql('DROP TABLE tipo_de_amenaza');
        $this->addSql('DROP INDEX IDX_4C3B123FC93340A ON alerta');
        $this->addSql('DROP INDEX IDX_4C3B123849405A9 ON alerta');
        $this->addSql('DROP INDEX IDX_4C3B1233D65129E ON alerta');
        $this->addSql('DROP INDEX IDX_4C3B1235221246E ON alerta');
        $this->addSql('ALTER TABLE alerta ADD severidad_amenaza INT NOT NULL, ADD superficie_afectada INT NOT NULL, ADD tiempo_desarrollo INT NOT NULL, ADD tipo_amenaza INT NOT NULL, DROP nivelgravedad_id, DROP superficie_afectada_id, DROP tiempo_desarrollo_id, DROP nombre_tipo_de_amenaza_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gravedad_amenaza (id INT AUTO_INCREMENT NOT NULL, nivelgravedad INT NOT NULL, nombre_campo_gravedad_amenaza VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE superficie_amenaza (id INT AUTO_INCREMENT NOT NULL, superficie_afectada INT NOT NULL, nombre_campo_superficie_afectada VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tiempo_amenaza (id INT AUTO_INCREMENT NOT NULL, tiempo_desarrollo INT NOT NULL, nombre_campo_tiempo_desarrollo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tipo_de_amenaza (id INT AUTO_INCREMENT NOT NULL, nombre_tipo_de_amenaza VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, valor_tipo_de_amenaza INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE alerta ADD nivelgravedad_id INT NOT NULL, ADD superficie_afectada_id INT NOT NULL, ADD tiempo_desarrollo_id INT NOT NULL, ADD nombre_tipo_de_amenaza_id INT NOT NULL, DROP severidad_amenaza, DROP superficie_afectada, DROP tiempo_desarrollo, DROP tipo_amenaza');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B123FC93340A FOREIGN KEY (nombre_tipo_de_amenaza_id) REFERENCES tipo_de_amenaza (id)');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B1235221246E FOREIGN KEY (tiempo_desarrollo_id) REFERENCES tiempo_amenaza (id)');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B123849405A9 FOREIGN KEY (nivelgravedad_id) REFERENCES gravedad_amenaza (id)');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B1233D65129E FOREIGN KEY (superficie_afectada_id) REFERENCES superficie_amenaza (id)');
        $this->addSql('CREATE INDEX IDX_4C3B123FC93340A ON alerta (nombre_tipo_de_amenaza_id)');
        $this->addSql('CREATE INDEX IDX_4C3B123849405A9 ON alerta (nivelgravedad_id)');
        $this->addSql('CREATE INDEX IDX_4C3B1233D65129E ON alerta (superficie_afectada_id)');
        $this->addSql('CREATE INDEX IDX_4C3B1235221246E ON alerta (tiempo_desarrollo_id)');
    }
}
