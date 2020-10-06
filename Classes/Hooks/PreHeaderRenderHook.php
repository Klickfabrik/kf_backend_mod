<?php
/**
 * Created by PhpStorm.
 * User: finnern
 * Date: 23.08.16
 * Time: 15:01
 */

class PreHeaderRenderHook {

    private $extKEY = "kf_backend_mod";

    function preHeaderRenderHook (&$hookParameters) {
        if($hookParameters !== NULL) {
            $file = "../typo3conf/ext/{$this->extKEY}/Public/js/typo3_backend/kf_backend_mod.js";
            $hookParameters['pageRenderer']->loadJquery();
            $hookParameters['pageRenderer']->addJsFile(
                $file,
                'text/javascript');
        }
    }
}