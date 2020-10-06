<?php
/**
 * Created by PhpStorm.
 * User: finnern
 * Date: 10.06.16
 * Time: 08:49
 */

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
    $javascriptFile = "../typo3conf/ext/{$extKEY}/Public/js/typo3_backend/kf_backend_mod.js";

    // TYPO3 VERSION SWITCH
    switch ( true ) {
        case TYPO3_version < 7:
            $doc = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Backend\\Template\\DocumentTemplate');
            $doc->getPageRenderer()->loadExtJS();
            $doc->getPageRenderer()->addJsFile($javascriptFile);
            break;

        case TYPO3_version > 8:
            $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
            $pageRenderer->loadExtJS();
            $pageRenderer->addJsFile($javascriptFile);
            break;
    }
}