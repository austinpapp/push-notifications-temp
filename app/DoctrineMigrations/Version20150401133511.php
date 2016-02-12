<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150401133511 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE users_groups ADD permissions_address TINYINT(1) DEFAULT \'0\' NOT NULL, ADD permissions_email TINYINT(1) DEFAULT \'0\' NOT NULL, ADD permissions_phone TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('UPDATE users_groups SET permissions_address = 1, permissions_email = 1, permissions_phone = 1 WHERE permissions_contacts = 1');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE users_groups DROP permissions_address, DROP permissions_email, DROP permissions_phone');
    }
}
