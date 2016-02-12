<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140805192809 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE hash_tags_questions (hash_tag_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_28B783B9AB18B62D (hash_tag_id), INDEX IDX_28B783B91E27F6BF (question_id), PRIMARY KEY(hash_tag_id, question_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE hash_tags_questions ADD CONSTRAINT FK_28B783B9AB18B62D FOREIGN KEY (hash_tag_id) REFERENCES hash_tags (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE hash_tags_questions ADD CONSTRAINT FK_28B783B91E27F6BF FOREIGN KEY (question_id) REFERENCES poll_questions (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE poll_questions ADD cached_hash_tags LONGTEXT DEFAULT NULL COMMENT '(DC2Type:array)'");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE hash_tags_questions");
        $this->addSql("ALTER TABLE poll_questions DROP cached_hash_tags");
    }
}
