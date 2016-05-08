<?php

namespace RudyOnfroy\DBViewerCleanerBundle\ValueObject;

/**
 * Class Parameter.
 */
class Parameter
{
    /** @var  int $id */
    private $id;

    /** @var string $name */
    private $name;
    /** @var string $value */
    private $value;

    /**
     * Parameter constructor.
     *
     * @param int    $id
     * @param string $name
     * @param string $value
     */
    public function __construct($id, $name, $value)
    {
        $this->id    = $id;
        $this->name  = $name;
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
