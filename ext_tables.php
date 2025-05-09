<?php
defined('TYPO3') || die();

call_user_func(function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'tt_content',
        []
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
        [
            'Einsatzübersicht',
            'firefighter_einsatz',
            'EXT:firefighter/Resources/Public/Icons/tx_firefighter_einsatz.svg'
        ],
        'list_type',
        'firefighter'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_firefighter_einsatz',
        'EXT:firefighter/Resources/Private/Language/locallang_csh_tx_firefighter_einsatz.xlf'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_firefighter_einsatz');
});
