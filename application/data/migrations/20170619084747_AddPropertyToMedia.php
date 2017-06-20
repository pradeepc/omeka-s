<?php
namespace Omeka\Db\Migrations;

use Doctrine\DBAL\Connection;
use Omeka\Db\Migration\MigrationInterface;

class AddPropertyToMedia implements MigrationInterface
{
    public function up(Connection $conn)
    {
        $conn->query('ALTER TABLE media ADD property_id INT DEFAULT NULL;');
        $conn->query('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE SET NULL;');
        $conn->query('CREATE INDEX IDX_6A2CA10C549213EC ON media (property_id);');
    }
}
