<?php

namespace RudyOnfroy\DBViewerCleanerBundle\Provider;

use RudyOnfroy\DBViewerCleanerBundle\State\ViewerStateInterface;
use RudyOnfroy\DBViewerCleanerBundle\ValueObject\Viewer;
use Symfony\Component\Form\FormFactoryInterface;

/**
 * Class ParamProvider.
 */
class ParamProvider implements ParamProviderInterface
{
    /** @var FormFactoryInterface $formFactory */
    private $formFactory;

    /** @var ViewerProviderInterface $viewerProvider */
    private $viewerProvider;

    /** @var ViewerStateInterface $state */
    private $state;

    /**
     * FormProvider constructor.
     *
     * @param ViewerStateInterface    $state
     * @param FormFactoryInterface    $formFactory
     * @param ViewerProviderInterface $viewerProvider
     */
    public function __construct(ViewerStateInterface $state, FormFactoryInterface $formFactory, ViewerProviderInterface $viewerProvider)
    {
        $this->state          = $state;
        $this->formFactory    = $formFactory;
        $this->viewerProvider = $viewerProvider;
    }

    /**
     * @return \Symfony\Component\Form\Form
     */
    public function getCurrentForm()
    {
        /** @var Viewer $viewer */
        $viewer = $this->viewerProvider->getCurrent();

        $formBuilder = $this->formFactory->createBuilder('form');

        $data = array();
        foreach ($viewer->getParams() as $param) {
            $data[$param->getName()] = $param->getValue();
            $formBuilder->add($param->getName(), 'text', ['required' => false ]);
        }

        $formBuilder->setData($data);
        $form = $formBuilder->getForm();

        return $form;
    }
}
