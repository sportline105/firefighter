<?php
return [
    'ctrl' => [
        'title' => 'Fahrzeug',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'iconfile' => 'EXT:firefighter/Resources/Public/Icons/tx_firefighter_car.svg',
    ],
    'types' => [
        '1' => ['showitem' =>
            '--palette--;;general, title, link, image, 
             --div--;Zugriff, hidden, starttime, endtime, 
             --div--;Sprache, sys_language_uid, l10n_parent'
        ]
    ],
    'palettes' => [
        'general' => ['showitem' => '']
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    ['All Languages', -1, 'flags-multiple'],
                    ['Default', 0, 'flags-default']
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [['', 0]],
                'foreign_table' => 'tx_firefighter_domain_model_car',
                'foreign_table_where' => 'AND tx_firefighter_domain_model_car.pid=###CURRENT_PID### AND tx_firefighter_domain_model_car.sys_language_uid IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_diffsource' => [
            'config' => ['type' => 'passthrough'],
        ],

        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [['', 1]],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
                'range' => ['upper' => mktime(0, 0, 0, 1, 1, 2038)],
            ],
        ],

        'title' => [
            'exclude' => true,
            'label' => 'Bezeichnung',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim,required',
            ],
        ],

        'link' => [
            'exclude' => true,
            'label' => 'Link',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
'image' => [
    'exclude' => true,
    'label' => 'Bilder',
    'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
        'images',
        [
            'maxitems' => 1,
            'appearance' => [
                'createNewRelationLinkTitle' => 'Bilder hinzufügen',
                'collapseAll' => true,
                'useSortable' => true,
            ],
        ],
        'jpg,jpeg,png,svg'
    ),
],

    ],
];