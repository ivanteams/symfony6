<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240202125907 extends AbstractMigration
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
        $this->addSql('CREATE TABLE clubes (cif VARCHAR(9) NOT NULL, nombre VARCHAR(45) NOT NULL, fundacion DATE NOT NULL, num_socios SMALLINT DEFAULT NULL, estadio VARCHAR(45) NOT NULL, PRIMARY KEY(cif)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrenadores (nif_nie VARCHAR(9) NOT NULL, clubes_cif VARCHAR(9) NOT NULL, nombre VARCHAR(45) NOT NULL, edad SMALLINT NOT NULL, destituido TINYINT(1) DEFAULT NULL, ficha NUMERIC(8, 2) DEFAULT NULL, INDEX IDX_E15FDEE2B4CE1D75 (clubes_cif), PRIMARY KEY(nif_nie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jugadores (nif_nie VARCHAR(9) NOT NULL, clubes_cif VARCHAR(9) NOT NULL, posiciones_id INT NOT NULL, nombre VARCHAR(45) NOT NULL, edad SMALLINT NOT NULL, cedido TINYINT(1) DEFAULT NULL, ficha NUMERIC(8, 2) DEFAULT NULL, INDEX IDX_CF491B76B4CE1D75 (clubes_cif), INDEX IDX_CF491B76F1666D8D (posiciones_id), PRIMARY KEY(nif_nie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partidos (clubes_cif_local VARCHAR(9) NOT NULL, clubes_cif_visitante VARCHAR(9) NOT NULL, fecha DATE NOT NULL, goles_local SMALLINT NOT NULL, goles_visitante SMALLINT NOT NULL, arbitro VARCHAR(45) NOT NULL, INDEX IDX_8C926FF696B464CC (clubes_cif_local), INDEX IDX_8C926FF65800EC72 (clubes_cif_visitante), PRIMARY KEY(clubes_cif_local, clubes_cif_visitante)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posiciones (id INT AUTO_INCREMENT NOT NULL, posicion VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alumnos ADD CONSTRAINT FK_5EC5A6AB3C604661 FOREIGN KEY (aulas_num_aula) REFERENCES aulas (num_aula)');
        $this->addSql('ALTER TABLE entrenadores ADD CONSTRAINT FK_E15FDEE2B4CE1D75 FOREIGN KEY (clubes_cif) REFERENCES clubes (cif)');
        $this->addSql('ALTER TABLE jugadores ADD CONSTRAINT FK_CF491B76B4CE1D75 FOREIGN KEY (clubes_cif) REFERENCES clubes (cif)');
        $this->addSql('ALTER TABLE jugadores ADD CONSTRAINT FK_CF491B76F1666D8D FOREIGN KEY (posiciones_id) REFERENCES posiciones (id)');
        $this->addSql('ALTER TABLE partidos ADD CONSTRAINT FK_8C926FF696B464CC FOREIGN KEY (clubes_cif_local) REFERENCES clubes (cif)');
        $this->addSql('ALTER TABLE partidos ADD CONSTRAINT FK_8C926FF65800EC72 FOREIGN KEY (clubes_cif_visitante) REFERENCES clubes (cif)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alumnos DROP FOREIGN KEY FK_5EC5A6AB3C604661');
        $this->addSql('ALTER TABLE entrenadores DROP FOREIGN KEY FK_E15FDEE2B4CE1D75');
        $this->addSql('ALTER TABLE jugadores DROP FOREIGN KEY FK_CF491B76B4CE1D75');
        $this->addSql('ALTER TABLE jugadores DROP FOREIGN KEY FK_CF491B76F1666D8D');
        $this->addSql('ALTER TABLE partidos DROP FOREIGN KEY FK_8C926FF696B464CC');
        $this->addSql('ALTER TABLE partidos DROP FOREIGN KEY FK_8C926FF65800EC72');
        $this->addSql('DROP TABLE alumnos');
        $this->addSql('DROP TABLE aulas');
        $this->addSql('DROP TABLE clubes');
        $this->addSql('DROP TABLE entrenadores');
        $this->addSql('DROP TABLE jugadores');
        $this->addSql('DROP TABLE partidos');
        $this->addSql('DROP TABLE posiciones');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
