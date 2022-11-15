<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221115120253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerta ADD espacio_protegido VARCHAR(255) NOT NULL, ADD plan_de_gestion VARCHAR(255) NOT NULL, ADD actividades_de_conservacion VARCHAR(255) NOT NULL, ADD organizaciones VARCHAR(255) NOT NULL, ADD observaciones VARCHAR(500) DEFAULT NULL, ADD iba VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerta DROP espacio_protegido, DROP plan_de_gestion, DROP actividades_de_conservacion, DROP organizaciones, DROP observaciones, DROP iba');
    }
}
