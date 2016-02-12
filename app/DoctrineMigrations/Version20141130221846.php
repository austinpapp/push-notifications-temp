<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141130221846 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE social_activities (id INT AUTO_INCREMENT NOT NULL, group_id INT DEFAULT NULL, recipient_id INT DEFAULT NULL, following_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, target LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_7BA21D27FE54D947 (group_id), INDEX IDX_7BA21D27E92F8F78 (recipient_id), INDEX IDX_7BA21D271816E3A3 (following_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE social_activities ADD CONSTRAINT FK_7BA21D27FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE social_activities ADD CONSTRAINT FK_7BA21D27E92F8F78 FOREIGN KEY (recipient_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE social_activities ADD CONSTRAINT FK_7BA21D271816E3A3 FOREIGN KEY (following_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP TABLE social_activities');
    }
}
