<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140625213717 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE invites (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, group_id INT DEFAULT NULL, inviter_user_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_37E6A6CA76ED395 (user_id), INDEX IDX_37E6A6CFE54D947 (group_id), INDEX IDX_37E6A6C1A579695 (inviter_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE invites ADD CONSTRAINT FK_37E6A6CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE invites ADD CONSTRAINT FK_37E6A6CFE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE invites ADD CONSTRAINT FK_37E6A6C1A579695 FOREIGN KEY (inviter_user_id) REFERENCES user (id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE invites");
    }
}
