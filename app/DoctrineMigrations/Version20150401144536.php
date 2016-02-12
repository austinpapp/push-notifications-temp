<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20150401144536 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $results = $this->connection->fetchAll('SELECT id, required_permissions FROM groups WHERE required_permissions LIKE \'%permissions_contacts%\'');
        foreach ($results as $item) {
            $permissions = ['permissions_address', 'permissions_email', 'permissions_phone'];

            foreach (unserialize($item['required_permissions']) as $permission) {
                if ($permission !== 'permissions_contacts') {
                    $permissions[] = $permission;
                }
            }
            $permissions = serialize($permissions);
            $this->addSql("UPDATE groups SET required_permissions = '$permissions' WHERE id = {$item['id']}");
        }
    }

    public function down(Schema $schema)
    {
    }
}
