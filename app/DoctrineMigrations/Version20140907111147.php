<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140907111147 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE subscriptions ADD card_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE subscriptions ADD CONSTRAINT FK_4778A014ACC9A20 FOREIGN KEY (card_id) REFERENCES cards (id) ON DELETE SET NULL");
        $this->addSql("CREATE INDEX IDX_4778A014ACC9A20 ON subscriptions (card_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE subscriptions DROP FOREIGN KEY FK_4778A014ACC9A20");
        $this->addSql("DROP INDEX IDX_4778A014ACC9A20 ON subscriptions");
        $this->addSql("ALTER TABLE subscriptions DROP card_id");
    }
}
