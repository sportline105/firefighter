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


    /**
     * Inject the repository (compatible with TYPO3 9.5)
     */
    public function injectEinsatzRepository(EinsatzRepository $einsatzRepository): void
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
