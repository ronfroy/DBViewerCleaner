<?php

namespace RudyOnfroy\DBViewerCleanerBundle\Provider;
use Symfony\Component\Form\Form;

/**
 * Interface ParamProviderInterface.
 */
interface ParamProviderInterface
{
    /**
     * @return Form
     */
    public function getCurrentForm();
}
