<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141007212606 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE discounts_codes_history (id INT AUTO_INCREMENT NOT NULL, code_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, status SMALLINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_D17C9E8727DAFE17 (code_id), INDEX IDX_D17C9E879395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE discounts_codes_history ADD CONSTRAINT FK_D17C9E8727DAFE17 FOREIGN KEY (code_id) REFERENCES discounts_codes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE discounts_codes_history ADD CONSTRAINT FK_D17C9E879395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP TABLE discounts_codes_history');
    }
}
