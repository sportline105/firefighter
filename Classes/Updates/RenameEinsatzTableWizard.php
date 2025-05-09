<?php
namespace Vendor\Firefighter\Updates;

use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

class RenameTablesWizard implements UpgradeWizardInterface
{
    protected array $tablesToRename = [
        'tx_firefighter_einsatz' => 'tx_firefighter_domain_model_einsatz',
        'tx_firefighter_type' => 'tx_firefighter_domain_model_type',
        'tx_firefighter_car' => 'tx_firefighter_domain_model_car',
    ];

    public function getIdentifier(): string
    {
        return 'firefighterRenameTablesWizard';
    }

    public function getTitle(): string
    {
        return 'Rename old firefighter tables to Extbase-compatible names';
    }

    public function getDescription(): string
    {
        return 'Renames legacy firefighter tables to match Extbase naming conventions.';
    }

    public function executeUpdate(): bool
    {
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionByName(ConnectionPool::DEFAULT_CONNECTION_NAME);
        $schemaManager = $connection->getSchemaManager();

        foreach ($this->tablesToRename as $oldTable => $newTable) {
            if ($schemaManager->tablesExist([$oldTable]) && !$schemaManager->tablesExist([$newTable])) {
                $connection->executeStatement("RENAME TABLE `$oldTable` TO `$newTable`");
            }
        }

        return true;
    }

    public function updateNecessary(): bool
    {
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionByName(ConnectionPool::DEFAULT_CONNECTION_NAME);
        $schemaManager = $connection->getSchemaManager();

        foreach ($this->tablesToRename as $oldTable => $newTable) {
            if ($schemaManager->tablesExist([$oldTable]) && !$schemaManager->tablesExist([$newTable])) {
                return true;
            }
        }

        return false;
    }

    public function getPrerequisites(): array
    {
        return [];
    }
}