<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// TYPO3 VERSION SWITCH
$version = (int) substr(TYPO3_version,0,1);
switch ( $version ) {
    case $version < 9:
        $skin = sprintf("EXT:%s/Public/css/typo3_backend_8x/", $_EXTKEY);
        break;
    case 9:
        $skin = sprintf("EXT:%s/Public/css/typo3_backend_9x/", $_EXTKEY);
        break;
}

/// TYPO3 Skin
$TBE_STYLES['skins']['kf_backend_mod']['name'] = 'klickfabrik_mod';
$TBE_STYLES['skins']['kf_backend_mod']['stylesheetDirectories']['structure'] = $skin;

// Feld, das in allen Sprachen existiert
$addLangPagesColumn = array(
    'customTemplateClass' => array(
        'exclude' => 0,
        'label' => 'Custom: PageClass',
        'config' => array(
            'type' => 'input',
            'default' => '',
        ),
    ),
);

$addSeoFields = array(
    'customSeoTitle' => array(
        'exclude' => 0,
        'label' => 'Custom: SeoTitle',
        'config' => array(
            'type' => 'input',
            'default' => '',
            'size' => 50
        ),
    ),
);

// Ort der Feldes in den Backendeinstellungen definieren
ExtensionManagementUtility::addFieldsToPalette('pages', 'layout', '--linebreak--,customTemplateClass', '');
ExtensionManagementUtility::addToAllTCAtypes('pages_language_overlay', '--linebreak--,customTemplateClass');
ExtensionManagementUtility::addFieldsToPalette('pages', 'title', '--linebreak--,customSeoTitle', '');
ExtensionManagementUtility::addToAllTCAtypes('pages_language_overlay', '--linebreak--,customSeoTitle');


// Feld im TCA der Tabelle 'pages' hinzufügen
if (version_compare(TYPO3_branch, '6.2', '<')) {
    ExtensionManagementUtility::addTCAcolumns('pages',$addLangPagesColumn,1);
    ExtensionManagementUtility::addTCAcolumns('pages_language_overlay',$addLangPagesColumn,1);
    ExtensionManagementUtility::addTCAcolumns('pages',$addSeoFields,1);
    ExtensionManagementUtility::addTCAcolumns('pages_language_overlay',$addSeoFields,1);
} else {
    ExtensionManagementUtility::addTCAcolumns('pages',$addLangPagesColumn);
    ExtensionManagementUtility::addTCAcolumns('pages_language_overlay',$addLangPagesColumn);
    ExtensionManagementUtility::addTCAcolumns('pages',$addSeoFields);
    ExtensionManagementUtility::addTCAcolumns('pages_language_overlay',$addSeoFields);
}

// Save and close button
if($version == 9){
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['Backend\Template\Components\ButtonBar']['getButtonsHook'][] = 'Klickfabrik\SaveCloseCe\Hooks\SaveCloseHook->addSaveCloseButton';
}