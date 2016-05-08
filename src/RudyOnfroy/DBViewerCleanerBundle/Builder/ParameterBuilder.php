<?php

namespace RudyOnfroy\DBViewerCleanerBundle\Builder;

use RudyOnfroy\DBViewerCleanerBundle\ValueObject\Parameter;

/**
 * Class ParameterBuilder.
 */
class ParameterBuilder implements BuilderInterface
{
    /** @var  int $id */
    private $id;

    /** @var  string $name */
    private $name = '';

    /** @var  string $value */
    private $value = '';

    /**
     * ParameterBuilder constructor.
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Parameter constructor.
     */
    public function build()
    {
        return new Parameter(
            $this->id,
            $this->name,
            $this->value
        );
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
