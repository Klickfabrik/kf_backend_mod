<?php

namespace Klickfabrik\KFBackendMod\Hooks;

use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Localization\LanguageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Template\Components\Buttons\InputButton;

/**
 * Add an extra save and close button at the end
 *
 * Class SaveButtonHook
 * @package Klickfabrik\KFBackendMod\Hooks
 */
Class SaveShowHook
{
    /**
     * @param array $params
     * @param $buttonBar
     * @return array
     */
    public function addSaveShowButton($params, &$buttonBar)
    {
        $buttons = $params['buttons'];
        $saveButton = $buttons[ButtonBar::BUTTON_POSITION_LEFT][2][0];
        if ($saveButton instanceof InputButton) {
            /** @var IconFactory $iconFactory */
            $iconFactory = GeneralUtility::makeInstance(IconFactory::class);

            $saveShowButton = $buttonBar->makeInputButton()
                ->setName('save-view')
                ->setValue('1')
                ->setForm($saveButton->getForm())
                ->setTitle($this->getLanguageService()->sL('LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:rm.saveDocShow'))
                ->setIcon($iconFactory->getIcon('actions-document-save-view', Icon::SIZE_SMALL))
                ->setShowLabelText(true);

            $buttons[ButtonBar::BUTTON_POSITION_LEFT][2][] = $saveShowButton;
        }
        return $buttons;
    }

    /**
     * Returns the language service
     * @return LanguageService
     */
    protected function getLanguageService()
    {
        return $GLOBALS['LANG'];
    }
}
