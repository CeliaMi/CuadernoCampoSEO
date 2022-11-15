<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221115131154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alerta ADD espacio_protegido VARCHAR(255) NOT NULL, ADD plan_de_gestion VARCHAR(255) NOT NULL, ADD actividades_de_conservacion VARCHAR(255) NOT NULL, ADD organizaciones VARCHAR(255) NOT NULL, ADD observaciones VARCHAR(500) DEFAULT NULL, ADD iba VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE gravedad_amenaza ADD nombre_campo_gravedad_amenaza VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE superficie_amenaza ADD nombre_campo_superficie_afectada VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tiempo_amenaza ADD nombre_campo_tiempo_desarrollo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tipo_de_amenaza ADD valor_tipo_de_amenaza INT NOT NULL, CHANGE nombre_tipo_de_amenaza nombre_tipo_de_amenaza VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE alerta DROP espacio_protegido, DROP plan_de_gestion, DROP actividades_de_conservacion, DROP organizaciones, DROP observaciones, DROP iba');
        $this->addSql('ALTER TABLE gravedad_amenaza DROP nombre_campo_gravedad_amenaza');
        $this->addSql('ALTER TABLE superficie_amenaza DROP nombre_campo_superficie_afectada');
        $this->addSql('ALTER TABLE tiempo_amenaza DROP nombre_campo_tiempo_desarrollo');
        $this->addSql('ALTER TABLE tipo_de_amenaza DROP valor_tipo_de_amenaza, CHANGE nombre_tipo_de_amenaza nombre_tipo_de_amenaza INT NOT NULL');
    }
}
