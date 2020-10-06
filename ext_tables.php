<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

/// TYPO3 Skin
$TBE_STYLES['skins']['kf_backend_mod']['name'] = 'klickfabrik_mod';
$TBE_STYLES['skins']['kf_backend_mod']['stylesheetDirectories']['structure'] = 'EXT:' . ($_EXTKEY) . '/Public/css/typo3_backend/';


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
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('pages', 'layout', '--linebreak--,customTemplateClass', '');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages_language_overlay', '--linebreak--,customTemplateClass');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('pages', 'title', '--linebreak--,customSeoTitle', '');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages_language_overlay', '--linebreak--,customSeoTitle');


// Feld im TCA der Tabelle 'pages' hinzufügen
if (version_compare(TYPO3_branch, '6.2', '<')) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages',$addLangPagesColumn,1);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages_language_overlay',$addLangPagesColumn,1);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages',$addSeoFields,1);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages_language_overlay',$addSeoFields,1);
} else {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages',$addLangPagesColumn);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages_language_overlay',$addLangPagesColumn);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages',$addSeoFields);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages_language_overlay',$addSeoFields);
}