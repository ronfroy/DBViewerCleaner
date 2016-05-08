<?php

namespace RudyOnfroy\DBViewerCleanerBundle\Provider;
use RudyOnfroy\DBViewerCleanerBundle\ValueObject\Query;

/**
 * Interface QueryProviderInterface.
 */
interface QueryProviderInterface
{
    /**
     * @return Query
     */
    public function getCurrent();
}
