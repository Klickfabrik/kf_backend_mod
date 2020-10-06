<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "kf_backend_mod".
 *
 * Auto generated 06-10-2020 10:06
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'KF - T3 Backend Mod',
    'description' => 'Modify TYPO3 Backend: smaller Icons, Save icons without text, Save & Close BTN',
    'category' => 'be',
    'author' => 'Marc Finnern',
    'author_email' => 'marc@klickfabrik.net',
    'state' => 'stable',
    'uploadfolder' => false,
    'clearCacheOnLoad' => 0,
    'version' => '1.4.1',
    'constraints' =>
        [
            'depends' =>
                [
                    'typo3' => '6.2.0-10.4.99',
                ],
            'conflicts' =>
                [
                ],
            'suggests' =>
                [
                ],
        ],
    'clearcacheonload' => false,
    'author_company' => NULL,
];