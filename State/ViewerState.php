<?php

namespace RudyOnfroy\DBViewerCleanerBundle\State;

/**
 * Class ViewerState.
 */
class ViewerState implements ViewerStateInterface
{
    /** @var  int $queryId */
    private $queryId;

    /** @var  int $viewerId */
    private $viewerId;

    /**
     * @return int
     */
    public function getQueryId()
    {
        return $this->queryId;
    }

    /**
     * @param $queryId
     *
     * @return $this
     */
    public function setQueryId($queryId)
    {
        $this->queryId = $queryId;

        return $this;
    }

    /**
     * @return int
     */
    public function getViewerId()
    {
        return $this->viewerId;
    }

    /**
     * @param $viewerId
     *
     * @return $this
     */
    public function setViewerId($viewerId)
    {
        $this->viewerId = $viewerId;

        return $this;
    }
}
