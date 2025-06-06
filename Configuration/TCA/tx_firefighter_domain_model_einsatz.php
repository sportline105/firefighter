<?php
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
return [
    'ctrl' => [
        'title' => 'Einsatz',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,location,description,number',
        'iconfile' => 'EXT:firefighter/Resources/Public/Icons/tx_firefighter_einsatz.svg',
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => ['type' => 'language'],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l10n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [['', 0]],
                'foreign_table' => 'tx_firefighter_domain_model_einsatz',
                'foreign_table_where' => 'AND tx_firefighter_domain_model_einsatz.pid=###CURRENT_PID### AND tx_firefighter_domain_model_einsatz.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => ['config' => ['type' => 'passthrough']],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => ['type' => 'check', 'default' => 1],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => null,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => null,
                'range' => ['upper' => mktime(0, 0, 0, 1, 1, 2038)],
            ],
        ],
        'title' => ['label' => 'Titel', 'config' => ['type' => 'input', 'size' => 50]],
        'location' => ['label' => 'Ort', 'config' => ['type' => 'input', 'size' => 50]],
        'description' => [
            'exclude' => true,
            'label' => 'Beschreibung',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
'images' => [
    'exclude' => true,
    'label' => 'Bilder',
    'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
        'images',
        [
            'maxitems' => 10,
            'appearance' => [
                'createNewRelationLinkTitle' => 'Bilder hinzufügen',
                'collapseAll' => true,
                'useSortable' => true,
            ],
        ],
        'jpg,jpeg,png,svg'
    ),
],
        'short_description' => ['label' => 'Kurzbeschreibung', 'config' => ['type' => 'text', 'rows' => 5]],
 // Einsatzzeit
        'datefrom' => [
            'label' => 'LLL:EXT:firefighter/Resources/Private/Language/locallang_db.xlf:tx_firefighter_domain_model_einsatz.datefrom',
            'config' => ['type' => 'input', 'renderType' => 'inputDateTime', 'eval' => 'datetime', 'dbType' => 'datetime', 'default' => time()],
        ],
        'dateto' => [
            'label' => 'LLL:EXT:firefighter/Resources/Private/Language/locallang_db.xlf:tx_firefighter_domain_model_einsatz.dateto',
            'config' => ['type' => 'input', 'renderType' => 'inputDateTime', 'eval' => 'datetime', 'dbType' => 'datetime', 'default' => time()],
        ],
'cars' => [
    'exclude' => 0,
    'label' => 'Fahrzeuge',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectMultipleSideBySide',
        'foreign_table' => 'tx_firefighter_domain_model_car',
        'MM' => 'tx_firefighter_einsatz_cars_mm',
        'size' => 10,
        'autoSizeMax' => 30,
        'maxitems' => 9999,
        'minitems' => 0,
    ],
],
'stations' => [
    'exclude' => true,
    'label' => 'LLL:EXT:firefighter/Resources/Private/Language/locallang_db.xlf:tx_firefighter_domain_model_einsatz.stations',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
            ['Zörbig', 'Zörbig'],
            ['Cösitz','Cösitz'],
            ['Göttnitz','Göttnitz'],
            ['Großzöberitz','Großzöberitz'],
            ['Löberitz','Löberitz'],
            ['Quetzdölsdorf','Quetzdölsdorf'],
            ['Salzfurtkapelle','Salzfurtkapelle'],
            ['Schortewitz','Schortewitz'],
            ['Schrenz','Schrenz'],
            ['Stumsdorf','Stumsdorf'],
            ['Wadendorf','Wadendorf'],
        ],
        'size' => 1,
        'minitems' => 1,
        'maxitems' => 1,
    ]
],
        'type' => [
            'exclude' => true,
            'label' => 'Typ',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_firefighter_domain_model_type',
                'foreign_table_where' => 'AND tx_firefighter_domain_model_type.sys_language_uid IN (-1,0) ORDER BY title',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'geo_coords' => ['label' => 'Koordinaten', 'config' => ['type' => 'input', 'size' => 50]],
        'number' => ['label' => 'Interne Einsatznummer', 'config' => ['type' => 'input','default' => "ZÖ/000", 'size' => 30]],
        'mens' => ['label' => 'Mannschaft', 'config' => ['type' => 'input', 'eval' => 'int']],
        ],
        'types' => [
            '1' => ['showitem' => 'hidden, number, title, --palette--;;times, location, description, stations, short_description, cars, type, geo_coords, mens, --div--;Bilder, images, --div--;Zugriff, starttime, endtime']
    ],
    'palettes' => [
        'times' => [
            'showitem' => 'datefrom, dateto',
            'label' => 'Einsatzzeit',
        ],
    ],
];