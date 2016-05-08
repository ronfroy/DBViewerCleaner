<?php

namespace RudyOnfroy\DBViewerCleanerBundle\Provider;

use RudyOnfroy\DBViewerCleanerBundle\State\ViewerStateInterface;

/**
 * Class QueryProvider.
 */
class QueryProvider implements QueryProviderInterface
{
    /** @var ViewerProvider $viewerProvider */
    private $viewerProvider;

    /** @var ViewerStateInterface $state */
    private $state;

    /**
     * QueryProvider constructor.
     *
     * @param ViewerProvider $viewerProvider
     */
    public function __construct(ViewerStateInterface $state, ViewerProvider $viewerProvider)
    {
        $this->state          = $state;
        $this->viewerProvider = $viewerProvider;
    }

    public function getCurrent()
    {
        $viewer = $this->viewerProvider->getCurrent();

        /** @var \RudyOnfroy\DBViewerCleanerBundle\ValueObject\Viewer $viewer*/
        foreach ($viewer->getQueries() as $query) {
            if ($query->getId() == $this->state->getQueryId()) {
                return $query;
            }
        }
    }
}
