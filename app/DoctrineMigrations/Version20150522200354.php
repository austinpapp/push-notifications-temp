<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150522200354 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE payments_transaction ADD stripe_customer_id INT DEFAULT NULL, CHANGE customer_id customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE payments_transaction ADD CONSTRAINT FK_63BEF23B708DC647 FOREIGN KEY (stripe_customer_id) REFERENCES stripe_customers (id)');
        $this->addSql('CREATE INDEX IDX_63BEF23B708DC647 ON payments_transaction (stripe_customer_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE payments_transaction DROP FOREIGN KEY FK_63BEF23B708DC647');
        $this->addSql('DROP INDEX IDX_63BEF23B708DC647 ON payments_transaction');
        $this->addSql('ALTER TABLE payments_transaction DROP stripe_customer_id, CHANGE customer_id customer_id INT NOT NULL');
    }
}
