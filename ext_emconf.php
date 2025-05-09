<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Fire Fighter Manager',
    'description' => 'Darstellung vergangener Einsätze für Feuerwehr-Websites',
    'category' => 'plugin',
    'author' => 'Dein Name',
    'author_email' => 'deine@mail.de',
    'state' => 'stable',
    'clearcacheonload' => 1,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-12.9.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];