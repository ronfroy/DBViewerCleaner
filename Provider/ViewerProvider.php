<?php

namespace RudyOnfroy\DBViewerCleanerBundle\Provider;

use RudyOnfroy\DBViewerCleanerBundle\Builder\ParameterBuilder;
use RudyOnfroy\DBViewerCleanerBundle\Builder\QueryBuilder;
use RudyOnfroy\DBViewerCleanerBundle\Builder\ViewerBuilder;
use RudyOnfroy\DBViewerCleanerBundle\State\ViewerStateInterface;
use RudyOnfroy\DBViewerCleanerBundle\ValueObject\Parameter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class ViewerController.
 */
class ViewerProvider implements ViewerProviderInterface
{
    /** @var array $config */
    private $config;

    /** @var  Request $requestStack */
    private $request;

    /** @var ViewerStateInterface $state */
    private $state;

    /**
     * ViewerProvider constructor.
     *
     * @param ViewerStateInterface $state
     * @param array $config
     * @param RequestStack $requestStack
     */
    public function __construct(ViewerStateInterface $state, array $config, RequestStack $requestStack)
    {
        $this->state   = $state;
        $this->config  = $config;
        $this->request = $requestStack->getMasterRequest();
    }

    /**
     * @return \RudyOnfroy\DBViewerCleanerBundle\ValueObject\Viewer
     */
    public function getCurrent()
    {
        $viewerBuilder = ViewerBuilder::create();

        $i = 0;
        foreach ($this->config as $viewerName => $viewerConfig) {
            ++$i;

            if ($i == $this->state->getViewerId()) {
                $viewerBuilder->setId($i);
                $viewerBuilder->setName($viewerName);
                $j = 0;

                $data = $this->request->getSession()->get("DBViewerCleanerBundle($i)");

                /** @var Parameter[] $parameters */
                $parameters = array();
                foreach ($viewerConfig['parameters'] as $parameter) {
                    ++$j;

                    $parameter = ParameterBuilder::create()
                        ->setId($j)
                        ->setName($parameter)
                        ->setValue(isset($data[$parameter]) ? $data[$parameter] : '')
                        ->build()
                    ;

                    $parameters[] = $parameter;
                    $viewerBuilder->addParameter($parameter);
                }

                $k = 0;
                foreach ($viewerConfig['queries'] as $queryName => $querySql) {
                    ++$k;

                    foreach($parameters as $parameter){
                        $querySql = str_replace('{'.$parameter->getName().'}', addslashes($parameter->getValue()), $querySql);
                    }

                    $query = QueryBuilder::create()
                        ->setId($k)
                        ->setName($queryName)
                        ->setSql($querySql)
                        ->build()
                    ;

                    $viewerBuilder->addQuery($query);
                }

                return $viewerBuilder->build();
            }
        }
    }
}
