<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140810065545 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE poll_sections (question_id INT NOT NULL, group_section_id INT NOT NULL, INDEX IDX_9D0C3B281E27F6BF (question_id), INDEX IDX_9D0C3B28FEE82C8 (group_section_id), PRIMARY KEY(question_id, group_section_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE poll_sections ADD CONSTRAINT FK_9D0C3B281E27F6BF FOREIGN KEY (question_id) REFERENCES poll_questions (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE poll_sections ADD CONSTRAINT FK_9D0C3B28FEE82C8 FOREIGN KEY (group_section_id) REFERENCES group_sections (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE activity_condition ADD group_section_id INT DEFAULT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE poll_sections");
        $this->addSql("ALTER TABLE activity_condition DROP group_section_id");
    }
}
