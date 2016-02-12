<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150120145058 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE poll_answers DROP FOREIGN KEY FK_AC854B39A7C41D6F');
        $this->addSql('ALTER TABLE poll_answers ADD CONSTRAINT FK_AC854B39A7C41D6F FOREIGN KEY (option_id) REFERENCES poll_options (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE poll_answers DROP FOREIGN KEY FK_AC854B39A7C41D6F');
        $this->addSql('ALTER TABLE poll_answers ADD CONSTRAINT FK_AC854B39A7C41D6F FOREIGN KEY (option_id) REFERENCES poll_options (id)');
    }
}
