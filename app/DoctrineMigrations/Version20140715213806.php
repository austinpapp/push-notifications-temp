<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140715213806 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE customers ADD user_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE customers ADD CONSTRAINT FK_62534E21A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE");
        $this->addSql("CREATE INDEX IDX_62534E21A76ED395 ON customers (user_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE customers DROP FOREIGN KEY FK_62534E21A76ED395");
        $this->addSql("DROP INDEX IDX_62534E21A76ED395 ON customers");
        $this->addSql("ALTER TABLE customers DROP user_id");
    }
}
