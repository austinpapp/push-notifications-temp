<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140903093747 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE subscriptions (id INT AUTO_INCREMENT NOT NULL, representative_id INT DEFAULT NULL, group_id INT DEFAULT NULL, package_type INT NOT NULL, expired_at DATETIME NOT NULL, enabled TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_4778A01FC3FF006 (representative_id), UNIQUE INDEX UNIQ_4778A01FE54D947 (group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE subscriptions ADD CONSTRAINT FK_4778A01FC3FF006 FOREIGN KEY (representative_id) REFERENCES representatives (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE subscriptions ADD CONSTRAINT FK_4778A01FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE subscriptions");
    }
}
