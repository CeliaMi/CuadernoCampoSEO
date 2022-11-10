<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221110100134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alerta (id INT AUTO_INCREMENT NOT NULL, nivelgravedad_id INT NOT NULL, superficie_afectada_id INT NOT NULL, tiempo_desarrollo_id INT NOT NULL, nombre_tipo_de_amenaza_id INT NOT NULL, ubicacion VARCHAR(255) NOT NULL, foto VARCHAR(500) DEFAULT NULL, descripcion VARCHAR(500) NOT NULL, nombre_contacto VARCHAR(255) NOT NULL, email_contacto VARCHAR(50) NOT NULL, telefono_contacto VARCHAR(20) DEFAULT NULL, INDEX IDX_4C3B123849405A9 (nivelgravedad_id), INDEX IDX_4C3B1233D65129E (superficie_afectada_id), INDEX IDX_4C3B1235221246E (tiempo_desarrollo_id), INDEX IDX_4C3B123FC93340A (nombre_tipo_de_amenaza_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gravedad_amenaza (id INT AUTO_INCREMENT NOT NULL, nivelgravedad INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE superficie_amenaza (id INT AUTO_INCREMENT NOT NULL, superficie_afectada INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tiempo_amenaza (id INT AUTO_INCREMENT NOT NULL, tiempo_desarrollo INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_de_amenaza (id INT AUTO_INCREMENT NOT NULL, nombre_tipo_de_amenaza INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B123849405A9 FOREIGN KEY (nivelgravedad_id) REFERENCES gravedad_amenaza (id)');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B1233D65129E FOREIGN KEY (superficie_afectada_id) REFERENCES superficie_amenaza (id)');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B1235221246E FOREIGN KEY (tiempo_desarrollo_id) REFERENCES tiempo_amenaza (id)');
        $this->addSql('ALTER TABLE alerta ADD CONSTRAINT FK_4C3B123FC93340A FOREIGN KEY (nombre_tipo_de_amenaza_id) REFERENCES tipo_de_amenaza (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B123849405A9');
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B1233D65129E');
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B1235221246E');
        $this->addSql('ALTER TABLE alerta DROP FOREIGN KEY FK_4C3B123FC93340A');
        $this->addSql('DROP TABLE alerta');
        $this->addSql('DROP TABLE gravedad_amenaza');
        $this->addSql('DROP TABLE superficie_amenaza');
        $this->addSql('DROP TABLE tiempo_amenaza');
        $this->addSql('DROP TABLE tipo_de_amenaza');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
