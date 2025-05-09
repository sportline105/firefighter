<?php
namespace Vendor\Firefighter\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Vendor\Firefighter\Domain\Repository\EinsatzRepository;
use Vendor\Firefighter\Domain\Model\Einsatz;

class EinsatzController extends ActionController
{
    /**
     * @var EinsatzRepository
     */
    protected $einsatzRepository;

    // Moderne Dependency Injection (ab TYPO3 10+)
    public function __construct(EinsatzRepository $einsatzRepository)
    {
        $this->einsatzRepository = $einsatzRepository;
    }

    /**
     * Listet alle Einsätze sortiert nach UID absteigend auf
     */
    public function listAction(): void
    {
        $einsaetze = $this->einsatzRepository->findAllOrderedByUidDesc();
        $this->view->assign('einsaetze', $einsaetze);
    }

    /**
     * Zeigt einen einzelnen Einsatz an
     */
    public function showAction(Einsatz $einsatz): void
    {
        $this->view->assign('einsatz', $einsatz);
    }
}
