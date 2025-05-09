<?php
return [
    'ctrl' => [
        'title' => 'Einsatzart',
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

        'iconfile' => 'EXT:firefighter/Resources/Public/Icons/tx_firefighter_type.svg',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, hidden, title, image']
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
'hidden' => [
    'exclude' => true,
    'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
    'config' => [
        'type' => 'check',
        'items' => [
            ['LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:labels.enabled', 1]
        ],
    ],
],
'l10n_parent' => [
    'displayCond' => 'FIELD:sys_language_uid:>:0',
    'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'default' => 0,
        'items' => [
            ['', 0],
        ],
        'foreign_table' => 'tx_firefighter_domain_model_type', // <-- jeweils anpassen!
        'foreign_table_where' => 'AND tx_firefighter_domain_model_type.pid=###CURRENT_PID### AND tx_firefighter_domain_model_type.sys_language_uid IN (-1,0)',
    ],
],
'l10n_diffsource' => [
    'config' => [
        'type' => 'passthrough',
    ],
],
        'title' => [
            'label' => 'Bezeichnung',
            'config' => ['type' => 'input', 'size' => 50],
        ],
'image' => [
    'label' => 'Bild',
    'config' => [
        'type' => 'inline',
        'foreign_table' => 'sys_file_reference',
        'foreign_field' => 'uid_foreign',
        'foreign_sortby' => 'sorting_foreign',
        'foreign_table_field' => 'tablenames',
        'foreign_match_fields' => [
            'fieldname' => 'image',
        ],
        'foreign_label' => 'uid_local',
        'foreign_selector' => 'uid_local',
        'foreign_selector_fieldTcaOverride' => [
            'config' => [
                'appearance' => [
                    'elementBrowserType' => 'file',
                    'elementBrowserAllowed' => 'jpg,jpeg,png,svg'
                ]
            ]
        ],
        'overrideChildTca' => [
            'columns' => [
                'uid_local' => [
                    'config' => [
                        'appearance' => [
                            'elementBrowserType' => 'file',
                            'elementBrowserAllowed' => 'jpg,jpeg,png,svg',
                        ],
                    ],
                ],
            ],
        ],
        'maxitems' => 1,
        'minitems' => 0,
        'appearance' => [
            'newRecordLinkTitle' => 'Bild hinzufügen',
            'collapseAll' => 1,
            'showPossibleLocalizationRecords' => 1,
            'showRemovedLocalizationRecords' => 1,
            'showSynchronizationLink' => 1,
            'useSortable' => 0,
        ],
    ],
],
    ]
];