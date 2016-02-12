<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140713163849 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, payment_request_id INT DEFAULT NULL, balanced_uri VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_E52FFDEE77883970 (payment_request_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE77883970 FOREIGN KEY (payment_request_id) REFERENCES poll_questions (id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE orders");
    }
}
