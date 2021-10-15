<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// TYPO3 VERSION SWITCH
$_EXTKEY = 'kf_backend_mod';
$version = (int)substr(TYPO3_version, 0, 1) === 1 ? (int)substr(TYPO3_version, 0, 2) : (int)substr(TYPO3_version, 0, 1);
switch ($version) {
    case $version < 9:
        $skin = sprintf("EXT:%s/Public/css/typo3_backend_8x/", $_EXTKEY);
        $TBE_STYLES['skins']['kf_backend_mod']['name'] = 'klickfabrik_mod';
        $TBE_STYLES['skins']['kf_backend_mod']['stylesheetDirectories']['structure'] = $skin;
        break;
    case 9:
        $skin = sprintf("EXT:%s/Public/css/typo3_backend_9x/", $_EXTKEY);
        $TBE_STYLES['skins']['kf_backend_mod']['name'] = 'klickfabrik_mod';
        $TBE_STYLES['skins']['kf_backend_mod']['stylesheetDirectories']['structure'] = $skin;
        break;
    case 10:
    case 11:
        $skin = sprintf("EXT:%s/Public/css/typo3_backend_10x/", $_EXTKEY);
        $GLOBALS['TBE_STYLES']['skins']['kf_backend_mod']['name'] = 'klickfabrik_mod';
        $GLOBALS['TBE_STYLES']['skins']['kf_backend_mod']['stylesheetDirectories']['structure'] = $skin;
        break;
}

// Save and view button
switch ($version) {
    case 9:
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['Backend\Template\Components\ButtonBar']['getButtonsHook'][] = 'Klickfabrik\KFBackendMod\Hooks\SaveShowHook->addSaveShowButton';
        break;
}

// Save and close button
switch ($version) {
    case 9:
    case 10:
    case 11:
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['Backend\Template\Components\ButtonBar']['getButtonsHook'][] = 'Klickfabrik\KFBackendMod\Hooks\SaveCloseHook->addSaveCloseButton';
        break;
}

// Feld, das in allen Sprachen existiert
$addLangPagesColumn = [
    'customTemplateClass' => [
        'exclude' => 0,
        'label' => 'Custom: PageClass',
        'config' => [
            'type' => 'input',
            'default' => '',
        ],
    ],
];

$addSeoFields = [
    'customSeoTitle' => [
        'exclude' => 0,
        'label' => 'Custom: SeoTitle',
        'config' => [
            'type' => 'input',
            'default' => '',
            'size' => 50
        ],
    ],
];

// Ort der Feldes in den Backendeinstellungen definieren
ExtensionManagementUtility::addFieldsToPalette('pages', 'layout', '--linebreak--,customTemplateClass', '');
ExtensionManagementUtility::addFieldsToPalette('pages', 'title', '--linebreak--,customSeoTitle', '');

if (version_compare(TYPO3_branch, '9.5', '<')) {
    ExtensionManagementUtility::addToAllTCAtypes('pages_language_overlay', '--linebreak--,customTemplateClass');
    ExtensionManagementUtility::addToAllTCAtypes('pages_language_overlay', '--linebreak--,customSeoTitle');

    ExtensionManagementUtility::addTCAcolumns('pages_language_overlay', $addLangPagesColumn);
    ExtensionManagementUtility::addTCAcolumns('pages_language_overlay', $addSeoFields);
}

// Feld im TCA der Tabelle 'pages' hinzufügen
if (version_compare(TYPO3_branch, '6.2', '<')) {
    ExtensionManagementUtility::addTCAcolumns('pages', $addLangPagesColumn, 1);
    ExtensionManagementUtility::addTCAcolumns('pages', $addSeoFields, 1);

    ExtensionManagementUtility::addTCAcolumns('pages_language_overlay', $addLangPagesColumn, 1);
    ExtensionManagementUtility::addTCAcolumns('pages_language_overlay', $addSeoFields, 1);
} else {
    ExtensionManagementUtility::addTCAcolumns('pages', $addLangPagesColumn);
    ExtensionManagementUtility::addTCAcolumns('pages', $addSeoFields);
}
