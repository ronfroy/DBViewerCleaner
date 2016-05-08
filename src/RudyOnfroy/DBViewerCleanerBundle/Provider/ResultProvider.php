<?php

namespace RudyOnfroy\DBViewerCleanerBundle\Provider;

use Doctrine\DBAL\Connection;
use RudyOnfroy\DBViewerCleanerBundle\State\ViewerStateInterface;
use RudyOnfroy\DBViewerCleanerBundle\ValueObject\Viewer;
use Symfony\Component\Form\FormFactoryInterface;

/**
 * Class ResultProvider.
 */
class ResultProvider implements ResultProviderInterface
{
    /** @var Connection $connection */
    private $connection;

    /** @var QueryProviderInterface $queryProvider */
    private $queryProvider;

    /**
     * FormProvider constructor.
     *
     * @param QueryProviderInterface $queryProvider
     * @param Connection             $connection
     */
    public function __construct(QueryProviderInterface $queryProvider, Connection $connection)
    {
        $this->queryProvider  = $queryProvider;
        $this->connection     = $connection;
    }

    /**
     * @return \array
     */
    public function getCurrent()
    {
        $request = $this->queryProvider->getCurrent()->getSql();

        return $this->connection->executeQuery($request)->fetchAll();
    }
}
