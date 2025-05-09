<?php
defined('TYPO3') || die();

call_user_func(function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Vendor.Firefighter',
        'Einsatz',
        [
            \Vendor\Firefighter\Controller\EinsatzController::class => 'list, show'
        ],
        [
            \Vendor\Firefighter\Controller\EinsatzController::class => 'list'
        ]
    );
});
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['firefighterRenameTablesWizard']
    = \Vendor\Firefighter\Updates\RenameTablesWizard::class;
