<?php

namespace RudyOnfroy\DBViewerCleanerBundle\Provider;

/**
 * Interface ResultProviderInterface.
 */
interface ResultProviderInterface
{
    /**
     * @return array
     */
    public function getCurrent();
}
