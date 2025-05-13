<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250510080438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP SEQUENCE greeting_id_seq CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE car (uuid UUID NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(uuid))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE track (uuid UUID NOT NULL, name VARCHAR(255) NOT NULL, track_pieces JSON NOT NULL, PRIMARY KEY(uuid))
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE greeting
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE car
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE track
        SQL);
    }
}
