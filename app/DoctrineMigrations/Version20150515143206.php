<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150515143206 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE stripe_customers (id INT AUTO_INCREMENT NOT NULL, representative_id INT DEFAULT NULL, group_id INT DEFAULT NULL, user_id INT DEFAULT NULL, stripe_id VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_DDDE68EBFC3FF006 (representative_id), INDEX IDX_DDDE68EBFE54D947 (group_id), INDEX IDX_DDDE68EBA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stripe_customers ADD CONSTRAINT FK_DDDE68EBFC3FF006 FOREIGN KEY (representative_id) REFERENCES representatives (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stripe_customers ADD CONSTRAINT FK_DDDE68EBFE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stripe_customers ADD CONSTRAINT FK_DDDE68EBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP TABLE stripe_customers');
    }
}
