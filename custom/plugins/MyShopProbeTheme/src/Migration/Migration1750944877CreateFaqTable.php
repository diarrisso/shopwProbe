<?php declare(strict_types=1);

namespace MyShopProbeTheme\Migration;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
class Migration1750944877CreateFaqTable extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1750944877;
    }

    /**
     * @throws Exception
     */
    public function update(Connection $connection): void
    {

        $connection->executeStatement('
            CREATE TABLE IF NOT EXISTS `myshopprobe_faq` (
                `id` BINARY(16) NOT NULL,
                `question` VARCHAR(255) NOT NULL,
                `answer` LONGTEXT NOT NULL,
                `active` TINYINT(1) DEFAULT 1,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');

    }

    public function updateDestructive(Connection $connection): void
    {
        // No destructive changes needed for this migration
    }
}
