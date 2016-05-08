<?php

namespace RudyOnfroy\DBViewerCleanerBundle\Provider;

use RudyOnfroy\DBViewerCleanerBundle\ValueObject\Viewer;

/**
 * Interface ViewerProviderInterface.
 */
interface ViewerProviderInterface
{
    /**
     * @return Viewer
     */
    public function getCurrent();
}
