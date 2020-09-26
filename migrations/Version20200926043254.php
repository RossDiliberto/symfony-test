<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200926043254 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gruppo DROP utenti');
        $this->addSql('ALTER TABLE utenti ADD gruppo_id INT DEFAULT NULL, DROP gruppo');
        $this->addSql('ALTER TABLE utenti ADD CONSTRAINT FK_D7F3FFCB869B87DB FOREIGN KEY (gruppo_id) REFERENCES gruppo (id)');
        $this->addSql('CREATE INDEX IDX_D7F3FFCB869B87DB ON utenti (gruppo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gruppo ADD utenti INT NOT NULL');
        $this->addSql('ALTER TABLE utenti DROP FOREIGN KEY FK_D7F3FFCB869B87DB');
        $this->addSql('DROP INDEX IDX_D7F3FFCB869B87DB ON utenti');
        $this->addSql('ALTER TABLE utenti ADD gruppo INT NOT NULL, DROP gruppo_id');
    }
}
