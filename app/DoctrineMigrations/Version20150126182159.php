<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150126182159 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_15824CD85550C4ED');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A5550C4ED FOREIGN KEY (pid) REFERENCES comments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bank_accounts DROP FOREIGN KEY FK_FB88842B9395C3F3');
        $this->addSql('ALTER TABLE bank_accounts ADD CONSTRAINT FK_FB88842B9395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cards DROP FOREIGN KEY FK_4C258FD9395C3F3');
        $this->addSql('ALTER TABLE cards ADD CONSTRAINT FK_4C258FD9395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE poll_educational_context DROP FOREIGN KEY FK_B888EC6A1E27F6BF');
        $this->addSql('ALTER TABLE poll_educational_context ADD CONSTRAINT FK_B888EC6A1E27F6BF FOREIGN KEY (question_id) REFERENCES poll_questions (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE bank_accounts DROP FOREIGN KEY FK_FB88842B9395C3F3');
        $this->addSql('ALTER TABLE bank_accounts ADD CONSTRAINT FK_FB88842B9395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id)');
        $this->addSql('ALTER TABLE cards DROP FOREIGN KEY FK_4C258FD9395C3F3');
        $this->addSql('ALTER TABLE cards ADD CONSTRAINT FK_4C258FD9395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id)');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A5550C4ED');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_15824CD85550C4ED FOREIGN KEY (pid) REFERENCES comments (id)');
        $this->addSql('ALTER TABLE poll_educational_context DROP FOREIGN KEY FK_B888EC6A1E27F6BF');
        $this->addSql('ALTER TABLE poll_educational_context ADD CONSTRAINT FK_B888EC6A1E27F6BF FOREIGN KEY (question_id) REFERENCES poll_questions (id)');
    }
}
