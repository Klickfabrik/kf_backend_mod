<?php
/**
 * Created by PhpStorm.
 * User: finnern
 * Date: 10.06.16
 * Time: 08:49
 */

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

$extKEY = "kf_backend_mod";

$rootlinefields = &$GLOBALS["TYPO3_CONF_VARS"]["FE"]["addRootLineFields"];
if($rootlinefields != '') $rootlinefields .= ' , ';
$rootlinefields .= 'customTemplateClass';

$GLOBALS['TYPO3_CONF_VARS']['FE']['pageOverlayFields'] .= ',customTemplateClass';
$GLOBALS['TYPO3_CONF_VARS']['FE']['pageOverlayFields'] .= ',customSeoTitle';


/**
 * Add Javascript to backend
 * only in TYPO3_MODE 'Backend'
 ******************************* */
if (TYPO3_MODE == 'BE') {

    $path = ExtensionManagementUtility::extPath($extKEY);
    $javascriptFile = sprintf("%s/Public/js/typo3_backend/kf_backend_mod_8x.js",$path);

    // TYPO3 VERSION SWITCH
    $version = substr(TYPO3_version,0,1);
    switch ( $version ) {
        case 7:
            $doc = GeneralUtility::makeInstance('TYPO3\\CMS\\Backend\\Template\\DocumentTemplate');
            $doc->getPageRenderer()->loadExtJS();
            $doc->getPageRenderer()->addJsFile($javascriptFile);
            break;
        case 8 :
            $pageRenderer = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
            $pageRenderer->loadExtJS();
            $pageRenderer->addJsFile($javascriptFile);
            break;
        case 9:
            $javascriptFile = sprintf("%s/Public/js/typo3_backend/kf_backend_mod_9x.js",$path);
            $pageRenderer = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
            $pageRenderer->addJsInlineCode('effects', file_get_contents($javascriptFile));
            break;
    }
}