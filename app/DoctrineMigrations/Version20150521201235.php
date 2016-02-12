<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150521201235 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE stripe_charges (id INT AUTO_INCREMENT NOT NULL, from_customer INT NOT NULL, to_account INT DEFAULT NULL, stripe_id VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, amount INT NOT NULL, application_fee INT DEFAULT NULL, currency VARCHAR(3) NOT NULL, public_id VARCHAR(255) NOT NULL, question_id INT DEFAULT NULL, INDEX IDX_152861E0C7D66E93 (from_customer), INDEX IDX_152861E0F3AE6B51 (to_account), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stripe_charges ADD CONSTRAINT FK_152861E0C7D66E93 FOREIGN KEY (from_customer) REFERENCES stripe_customers (id)');
        $this->addSql('ALTER TABLE stripe_charges ADD CONSTRAINT FK_152861E0F3AE6B51 FOREIGN KEY (to_account) REFERENCES stripe_accounts (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP TABLE stripe_charges');
    }
}
