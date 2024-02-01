<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201133931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alumnos (nif VARCHAR(9) NOT NULL, aulas_num_aula SMALLINT NOT NULL, nombre VARCHAR(45) NOT NULL, edad SMALLINT NOT NULL, sexo TINYINT(1) NOT NULL, fechanac DATE NOT NULL, INDEX IDX_5EC5A6AB3C604661 (aulas_num_aula), PRIMARY KEY(nif)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aulas (num_aula SMALLINT NOT NULL, capacidad SMALLINT NOT NULL, docente VARCHAR(45) NOT NULL, hardware TINYINT(1) NOT NULL, PRIMARY KEY(num_aula)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alumnos ADD CONSTRAINT FK_5EC5A6AB3C604661 FOREIGN KEY (aulas_num_aula) REFERENCES aulas (num_aula)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alumnos DROP FOREIGN KEY FK_5EC5A6AB3C604661');
        $this->addSql('DROP TABLE alumnos');
        $this->addSql('DROP TABLE aulas');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
