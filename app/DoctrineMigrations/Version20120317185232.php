<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120317185232 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE Spielstaette (id INT AUTO_INCREMENT NOT NULL, beschreibung LONGTEXT NOT NULL, oeffnungszeiten LONGTEXT NOT NULL, adresse LONGTEXT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("CREATE TABLE User (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE Stammlokal DROP beschreibung, DROP oeffnungszeiten, DROP adresse");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE Turnier DROP FOREIGN KEY FK_A875C26A3523B2C8");
        $this->addSql("DROP TABLE Spielstaette");
        $this->addSql("DROP TABLE User");
        $this->addSql("ALTER TABLE Stammlokal ADD beschreibung LONGTEXT DEFAULT NULL, ADD oeffnungszeiten LONGTEXT DEFAULT NULL, ADD adresse LONGTEXT DEFAULT NULL");
    }
}
