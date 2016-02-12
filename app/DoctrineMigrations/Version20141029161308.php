<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141029161308 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE groups ADD parent_id INT DEFAULT NULL, ADD location_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D3970727ACA70 FOREIGN KEY (parent_id) REFERENCES groups (id)');
        $this->addSql('CREATE INDEX IDX_F06D3970727ACA70 ON groups (parent_id)');
        $this->addSql('UPDATE groups SET location_name = username WHERE group_type IN (1, 2)');
        $this->addSql('UPDATE groups SET parent_id = (SELECT id FROM (SELECT * FROM groups) AS country_groups WHERE country_groups.group_type = 1 LIMIT 1) WHERE group_type = 2');
        $this->addSql('UPDATE groups SET location_name = official_name WHERE group_type = 3');
        $this->addSql('UPDATE groups AS local_group SET parent_id = (SELECT id FROM (SELECT * FROM groups WHERE group_type = 2) AS state_group WHERE state_group.location_name = local_group.local_state LIMIT 1) WHERE group_type = 3');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE groups DROP FOREIGN KEY FK_F06D3970727ACA70');
        $this->addSql('DROP INDEX IDX_F06D3970727ACA70 ON groups');
        $this->addSql('ALTER TABLE groups DROP parent_id, DROP location_name');
    }
}
