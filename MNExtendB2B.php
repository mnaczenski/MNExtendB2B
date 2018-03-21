<?php
namespace MNExtendB2B;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\DeactivateContext;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;




class MNExtendB2B extends \Shopware\Components\Plugin
{
    public function activate(ActivateContext $context)
    {
        $context->scheduleClearCache(ActivateContext::CACHE_LIST_DEFAULT);
    }
    public function deactivate(DeactivateContext $context)
    {
        $context->scheduleClearCache(DeactivateContext::CACHE_LIST_DEFAULT);
    }
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PreDispatch_Frontend' => ['onFrontend',-100],
            'Enlight_Controller_Action_PreDispatch_Widgets' => ['onFrontend',-100]
        ];
    }

    /**
     * @param InstallContext $context
     * @throws \Exception
     */
    public function install(InstallContext $context)
    {

    }

    /**
     * @param UninstallContext $context
     * @throws \Exception
     */
    public function uninstall(UninstallContext $context)
    {
    }


    /**
     * @param \Enlight_Event_EventArgs $args
     * @throws \Exception
     */

    public function onFrontend(\Enlight_Event_EventArgs $args)
    {
        $this->container->get('Template')->addTemplateDir(
            $this->getPath() . '/Resources/views/'
        );
    }
}
