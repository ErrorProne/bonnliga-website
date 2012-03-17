<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120317155851 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE Spieler (id INT AUTO_INCREMENT NOT NULL, stammlokal_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_FBE58E2EE342308D (stammlokal_id), PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Stammlokal (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, typ VARCHAR(255) NOT NULL, beschreibung LONGTEXT DEFAULT NULL, oeffnungszeiten LONGTEXT DEFAULT NULL, adresse LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE Spieler ADD CONSTRAINT FK_FBE58E2EE342308D FOREIGN KEY (stammlokal_id) REFERENCES Stammlokal (id)");
        $this->addSql("DROP TABLE Location");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE Spieler DROP FOREIGN KEY FK_FBE58E2EE342308D");
        $this->addSql("CREATE TABLE Location (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("DROP TABLE Spieler");
        $this->addSql("DROP TABLE Stammlokal");
    }
}
