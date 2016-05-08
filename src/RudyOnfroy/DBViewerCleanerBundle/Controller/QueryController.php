<?php

namespace RudyOnfroy\DBViewerCleanerBundle\Controller;

use RudyOnfroy\DBViewerCleanerBundle\Provider\ParamProviderInterface;
use RudyOnfroy\DBViewerCleanerBundle\Provider\QueryProviderInterface;
use RudyOnfroy\DBViewerCleanerBundle\Provider\ResultProvider;
use RudyOnfroy\DBViewerCleanerBundle\Provider\ResultProviderInterface;
use RudyOnfroy\DBViewerCleanerBundle\Provider\ViewerProviderInterface;
use RudyOnfroy\DBViewerCleanerBundle\State\ViewerStateInterface;
use RudyOnfroy\DBViewerCleanerBundle\ValueObject\Query;
use RudyOnfroy\DBViewerCleanerBundle\ValueObject\Viewer;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

/**
 * Class QueryController.
 */
class QueryController
{
    /** @var \Symfony\Component\HttpFoundation\RequestStack */
    private $requestStack;

    /** @var \Symfony\Component\HttpFoundation\Request */
    private $request;

    /** @var ViewerProviderInterface */
    private $viewerProvider;

    /** @var QueryProviderInterface */
    private $queryProvider;

    /** @var ParamProviderInterface  */
    private $paramProvider;

    /** @var ViewerStateInterface $state */
    private $state;

    /** @var ResultProviderInterface $resultProvider */
    private $resultProvider;

    /**
     * ViewerController constructor.
     *
     * @param RequestStack            $requestStack
     * @param EngineInterface         $templateEngine
     * @param ParamProviderInterface  $paramProvider
     * @param ViewerProviderInterface $viewerProvider
     * @param QueryProviderInterface  $queryProvider
     * @param ResultProviderInterface $resultProvider
     */
    public function __construct(
        ViewerStateInterface $state,
        RequestStack $requestStack,
        EngineInterface $templateEngine,
        ParamProviderInterface $paramProvider,
        ViewerProviderInterface $viewerProvider,
        QueryProviderInterface $queryProvider,
        ResultProviderInterface $resultProvider
    ) {
        $this->state           = $state;
        $this->requestStack    = $requestStack;
        $this->request         = $requestStack->getMasterRequest();
        $this->templateEngine  = $templateEngine;
        $this->viewerProvider  = $viewerProvider;
        $this->queryProvider   = $queryProvider;
        $this->paramProvider   = $paramProvider;
        $this->resultProvider  = $resultProvider;
    }

    public function showAction($viewerId, $queryId)
    {
        $this->state
            ->setViewerId($viewerId)
            ->setQueryId($queryId)
        ;

        /** @var Form $form */
        $form = $this->paramProvider->getCurrentForm();

        if ($this->request->isMethod('POST')) {
            $form->handleRequest(($this->request));
            $data = $form->getData();

            $this->request->getSession()->set("DBViewerCleanerBundle($viewerId)", $data);
        }

        $html = $this->templateEngine->render('DBViewerCleanerBundle:Viewer:query.html.twig', [
            'viewer' => $this->viewerProvider->getCurrent(),
            'query' => $this->queryProvider->getCurrent(),
            'result' => $this->resultProvider->getCurrent(),
            'form' =>  $form->createView(),
        ]);

        return new Response($html);
    }
}
