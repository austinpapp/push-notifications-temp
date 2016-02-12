<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141214072020 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE balanced_payment ADD paid_out TINYINT(1) DEFAULT NULL');
        $this->addSql('CREATE INDEX state ON balanced_payment (state)');
        $this->addSql('CREATE INDEX question_id ON balanced_payment (question_id)');
        $this->addSql('CREATE INDEX orderId ON balanced_payment (order_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP INDEX state ON balanced_payment');
        $this->addSql('DROP INDEX question_id ON balanced_payment');
        $this->addSql('DROP INDEX orderId ON balanced_payment');
        $this->addSql('ALTER TABLE balanced_payment DROP paid_out');
    }
}
