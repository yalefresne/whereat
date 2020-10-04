<?php

declare(strict_types=1);

namespace App\Domain\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

final class Version20201005215932 extends AbstractMigration
{
    private const RESTAURANT_TABLE_NAME = TablesNameCatalog::RESTAURANTS;

    public function getDescription(): string
    {
        return 'Creates table restaurants';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable(self::RESTAURANT_TABLE_NAME);
        $table->addColumn('id', Types::STRING, ['length' => 36]);
        $table->addColumn('name', Types::STRING, ['length' => 150, 'notnull' => true]);
        $table->addColumn('alias', Types::STRING, ['length' => 150, 'notnull' => true]);
        $table->addColumn('url', Types::STRING, ['length' => 255, 'notnull' => false]);
        $table->addColumn('phone_number', Types::STRING, ['length' => 20, 'notnull' => true]);
        $table->addColumn('created_at', Types::DATETIME_IMMUTABLE, ['notnull' => true]);
        $table->addColumn('updated_at', Types::DATETIME_MUTABLE, ['notnull' => true]);
        $table->addColumn('deleted_at', Types::DATETIME_MUTABLE, ['notnull' => false]);

        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['alias']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable(self::RESTAURANT_TABLE_NAME);
    }
}
