<?php

namespace RudyOnfroy\DBViewerCleanerBundle\State;

/**
 * Interface ViewerStateInterface.
 */
interface ViewerStateInterface
{
    /**
     * @return int
     */
    public function getQueryId();

    /**
     * @param int $queryId
     *
     * @return $this
     */
    public function setQueryId($queryId);

    /**
     * @return int
     */
    public function getViewerId();

    /**
     * @param int $viewerId
     *
     * @return $this
     */
    public function setViewerId($viewerId);
}
