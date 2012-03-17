<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120317171518 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE Platzierung (id INT AUTO_INCREMENT NOT NULL, turnier_id INT DEFAULT NULL, spieler_id INT DEFAULT NULL, platzierung INT NOT NULL, INDEX IDX_3675DB0FB5FFB8C1 (turnier_id), INDEX IDX_3675DB0F6EAF0EC3 (spieler_id), PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Turnier (id INT AUTO_INCREMENT NOT NULL, spielstaette_id INT DEFAULT NULL, INDEX IDX_A875C26A3523B2C8 (spielstaette_id), PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE Platzierung ADD CONSTRAINT FK_3675DB0FB5FFB8C1 FOREIGN KEY (turnier_id) REFERENCES Turnier (id)");
        $this->addSql("ALTER TABLE Platzierung ADD CONSTRAINT FK_3675DB0F6EAF0EC3 FOREIGN KEY (spieler_id) REFERENCES Spieler (id)");
        $this->addSql("ALTER TABLE Turnier ADD CONSTRAINT FK_A875C26A3523B2C8 FOREIGN KEY (spielstaette_id) REFERENCES Stammlokal (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE Platzierung DROP FOREIGN KEY FK_3675DB0FB5FFB8C1");
        $this->addSql("DROP TABLE Platzierung");
        $this->addSql("DROP TABLE Turnier");
    }
}
