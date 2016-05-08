<?php

namespace RudyOnfroy\DBViewerCleanerBundle\Builder;

use RudyOnfroy\DBViewerCleanerBundle\ValueObject\Parameter;
use RudyOnfroy\DBViewerCleanerBundle\ValueObject\Query;
use RudyOnfroy\DBViewerCleanerBundle\ValueObject\Viewer;

/**
 * Class ViewerBuilder.
 */
class ViewerBuilder implements BuilderInterface
{
    /** @var  int $id */
    private $id;

    /** @var  string $name */
    private $name = '';

    /** @var Parameter[] $params*/
    private $params = [];

    /** @var Query[] $queries*/
    private $queries = [];

    /**
     * ViewerBuilder constructor.
     */
    public static function create()
    {
        return new self();
    }

    /**
     * @return Viewer
     */
    public function build()
    {
        return new Viewer(
            $this->id,
            $this->name,
            $this->params,
            $this->queries
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
     * @param $param
     *
     * @return $this
     */
    public function addParameter(Parameter $param)
    {
        $this->params[] = $param;

        return $this;
    }

    /**
     * @param $query
     *
     * @return $this
     */
    public function addQuery(Query $query)
    {
        $this->queries[] = $query;

        return $this;
    }
}
