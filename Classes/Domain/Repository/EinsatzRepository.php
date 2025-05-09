<?php
namespace Vendor\Firefighter\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

class EinsatzRepository extends Repository
{
    // Standardmäßige Methoden wie findAll() sind bereits enthalten

    /**
     * Beispiel: Alle Einsätze ab einem bestimmten Datum finden
     *
     * @param \DateTime $startDate
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findUpcoming(\DateTime $startDate): \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching(
            $query->greaterThanOrEqual('datefrom', $startDate)
        );
        return $query->execute();
    }

    /**
     * Gibt alle Einsätze sortiert nach UID absteigend zurück
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface|array
     */
    public function findAllOrderedByUidDesc()
    {
        $query = $this->createQuery();
        $query->setOrderings([
            'uid' => QueryInterface::ORDER_DESCENDING
        ]);
        return $query->execute();
    }
}
