<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140923194715 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE groups ADD permission_changed_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE users_groups ADD permissions_name TINYINT(1) DEFAULT \'0\' NOT NULL, ADD permissions_contacts TINYINT(1) DEFAULT \'0\' NOT NULL, ADD permissions_responses TINYINT(1) DEFAULT \'0\' NOT NULL, ADD permissions_approved_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE groups DROP permission_changed_at');
        $this->addSql('ALTER TABLE users_groups DROP permissions_name, DROP permissions_contacts, DROP permissions_responses, DROP permissions_approved_at');
    }
}
